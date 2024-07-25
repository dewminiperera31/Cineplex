db.collection('events').onSnapshot(snapshot => {
    // Handle the latest event
    const newestEvent = snapshot.docChanges()[0].doc.data()
    const id = snapshot.docChanges()[0].doc.id
    showLatestEvent(newestEvent, id);
    
    // delete the latest event element
    snapshot.docChanges().shift()
    
    snapshot.docChanges().forEach(event => {
        showEvents(event.doc.data(), event.doc.id)
    });
})

const addNewEvent = () => {
    const event = {
      name: form.name.value,
      attendee: form.attendee.value,
      booked: 0,
      description: form.description.value,
      status: parseInt(form.status.value, 10)
    }
      db.collection('events').add(event)
      .then(() => {
      // Reset the form values
      form.name.value = "",
      form.attendee.value = "",
      form.description.value = "",
      form.status.value = ""
  
      alert('Your event has been successfully saved')
      })
      .catch(err => console.log(err))
  }

  let bookedEvents = [];

const bookEvent = (booked, id) => {
  const getBookedEvents = localStorage.getItem('booked-events');

    if (getBookedEvents) {
     bookedEvents = JSON.parse(localStorage.getItem('booked-events'));
      if(bookedEvents.includes(id)) {
        alert('Seems like you have already booked this event') 
      } 
      else {
        saveBooking(booked, id)
     }
    } 
    else {
        saveBooking(booked, id)
    }
};

const saveBooking = (booked, id) => {
    bookedEvents.push(id);
    localStorage.setItem('booked-events', JSON.stringify(bookedEvents));

    const data = { booked: booked +1 }
    db.collection('events').doc(id).update(data)
    .then(() => alert('Event successfully booked'))
    .catch(err => console.log(err))
}

const eventsContainer = document.querySelector('.events-container')
const nav = document.querySelector('nav')
const welcomeEvent = document.querySelector('.welcome-event')
const form = document.querySelector('.form')

const showEvents = (event, id) => {
  const {name, attendee, status, description, booked} = event

  const eventStatus = status === 0 ? 'free': 'paid'
  const output = `
        <div class="card">
          <div class="card--details">
            <div>
              <h1>${name}</h1>
              <span>${attendee - booked} attendees</span>
            </div>
            <span class="card--details-ribbon ribbon-${eventStatus}">
                ${eventStatus}
            </span>
             <p>${description}</p>
            <button onclick="bookEvent(${booked} ,'${id}')" class="btn btn-tertiary">Book</button>
          </div>
        </div>
        `
    eventsContainer.innerHTML += output;
}

const showLatestEvent = (latestEvent, id) => {
  
    const {name, attendee, status, description, booked} = latestEvent 
    // Get the first event
      welcomeEvent.innerHTML = `
      <h1>${name}</h1>
      <p>${description.length >= 100 ? `${description.substring(0, 100)}...` : description}</p>
      <div>
        <span>Attendees: ${attendee - booked}</span>
        <span>Status: ${status === 0 ? 'free': 'paid'}</span>
       </div>
       <button onclick="bookEvent(${booked} ,'${id}')" class="btn btn-tertiary">Book</button>
      `
  }
  
  form.addEventListener('submit', e => {
    e.preventDefault()
    addNewEvent()
  })
  
  window.onscroll = () =>  {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      nav.style.background = 'var(--tertiary-color)';
      nav.style.boxShadow = '0 10px 42px rgba(25,17,34,.1)';
    } else {
      nav.style.background = 'none';
      nav.style.boxShadow = 'none';
    }
  }
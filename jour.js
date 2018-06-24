const frDate = {
      cancel: 'Annuler',
      clear: 'Vider',
      done: 'Ok',
      previousMonth: '‹',
      nextMonth: '›',
      months: [
        'Janvier',
        'Fevrier',
        'Mars',
        'Avril',
        'Mai',
        'Juin',
        'Juillet',
        'Août',
        'Septembre',
        'Octobre',
        'Novembre',
        'Decembre'
      ],
      monthsShort: [
        'Jan',
        'Fev',
        'Mar',
        'Apr',
        'Mai',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec'
      ],
      weekdays: [ 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi','Dimanche'],
      weekdaysShort: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam','Dim'],
      weekdaysAbbrev: ['L', 'M', 'M', 'J', 'V', 'S','D']
    }

const timepickerOptions = {
  twelveHour: false,
  defaultTime: '00:00',
  onSelect: function() {this.done()}
}

const texthoraire = `
  <div class="input-field col s4">
    <label>Heure de début :</label>
    <input type="text" class="timepicker" name="debut[]">
  </div>
  <div class="input-field col s4">
    <label>Heure de fin</label>
    <input type="text" class="timepicker" name="fin[]">
  </div>`;

const textregu = `
  <label>
    <input name="type" class="with-gap" type="radio" value="same" onchange="fixe()"/>
    <span>Horaire fixe</span>
  </label>
  <br><br>
  <label>
    <input name="type" class="with-gap" type="radio" value="diff" onchange="flex()"/>
    <span>Horaires par journée</span>
  </label>
  <br><br><hr><br>`;

const textponct = `<label for="id"> Choisissez vos jours </label>
<select id="custom"  multiple name="jours[]" onchange="select()">
  <option value="1">Lundi</option>
  <option value="2">Mardi</option>
  <option value="3">Mercredi</option>
  <option value="4">Jeudi</option>
  <option value="5">Vendredi</option>
  <option value="6">Samedi</option>
  <option value="7">Dimanche</option>
</select>
<label>Journées</label><hr><br>`;

const envoyer = `<button class="btn-large  waves-orange" type="submit">Envoyer
  <i class="material-icons right">send</i>
</button><br><br>`;


const heures = `<div class="input-field col s6">
  <label>Heure de début</label>
  <input type="text" class="timepicker" name="debut[]">
</div>
<div class="input-field col s6">
  <label>Heure de fin</label>
  <input type="text" class="timepicker" name="fin[]">
</div>` + envoyer;

function displayJours(jours) {
  let text = '';
  jours.forEach((jour) => {
    text += `
    <div class="row">
    <div class="input-field col s2">
      <p class="right"> ${jour} </p>
      <a id="add" class="btn-floating btn-large waves-effect waves-light" onclick="add()"><i class="material-icons">add</i></a>
    </div>
    <div class="input-field col s5">
      <label>Heure de début</label>
      <input type="text" class="timepicker" name="debut[]">
    </div>
    <div class="input-field col s5">
      <label>Heure de fin</label>
      <input type="text" class="timepicker" name="fin[]">
    </div>
  </div>`;
  })
  text += envoyer;
  return text;
}

let step1;
let step2;
let step3;

function add() {
  var htmlObject = document.createElement('div');
  htmlObject.className = 'row';
  htmlObject.innerHTML = texthoraire;
  const btn = document.getElementById("add");
  document.getElementById('test').insertBefore(htmlObject, btn);
  var heure = document.querySelectorAll('.timepicker');
  M.Timepicker.init(heure, timepickerOptions);
}

function regu() {
  if (step1) {
    step1.remove();
    step3.remove();
  }
  if (step2) {
    step2.remove();
  }
  var htmlObject = document.createElement('div');
  htmlObject.innerHTML = textregu;
  document.getElementById("form").appendChild(htmlObject);
  step1 = htmlObject;
  M.AutoInit();
}

function select(){
  if (step3){
    step2.remove();
    step3.remove();
  }
  var htmlObject = document.createElement('div');
  htmlObject.innerHTML = textregu;
  document.getElementById("form").appendChild(htmlObject);
  step3= htmlObject;

}

function custom() {
  if (step1) {
    step1.remove();
  }
  if (step2) {
    step2.remove();
  }
  var htmlObject = document.createElement('div');
  htmlObject.innerHTML = textponct;
  document.getElementById("form").appendChild(htmlObject);
  step1 = htmlObject;
  M.AutoInit();
}
function test(e) {
  console.log();;
}

function fixe() {
  if (step2) {
    step2.remove();
  }

  var htmlObject = document.createElement('div');
  htmlObject.innerHTML = heures;
  htmlObject.className = 'row';
  document.getElementById("form").appendChild(htmlObject);
  step2 = htmlObject;
  M.AutoInit();
  var heure = document.querySelectorAll('.timepicker');
  M.Timepicker.init(heure, timepickerOptions);
}

function flex() {
  if (step2) {
    step2.remove();
  }

  var htmlObject = document.createElement('div');
  let s = [];
  const listeJours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
  if (document.getElementById('semaine').checked) {
    jours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi'];
  } else if (document.getElementById('weekend').checked) {
    jours = ['Samedi','Dimanche']
  } else {
    let selectHtml = document.getElementById('custom');
    let valJours = Array.from(selectHtml.querySelectorAll("option:checked"),e=>e.value);
    jours = valJours.map(val => listeJours[parseInt(val)-1]);
  }
  htmlObject.innerHTML = displayJours(jours);
  document.getElementById("form").appendChild(htmlObject);
  step2 = htmlObject;
  M.AutoInit();
  var heure = document.querySelectorAll('.timepicker');
  M.Timepicker.init(heure, timepickerOptions);

}

document.addEventListener('DOMContentLoaded', function() {
  M.AutoInit();
  var request = window.location.search.match(/[a-z]+/g);
  if (request && request[0] === 'error') {
    M.Modal.getInstance(document.getElementById('error')).open();
  }
});

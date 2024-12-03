let obrazekPridat = document.querySelector('.add > img');
let row = document.querySelector(".row");
let rowKopie = row.cloneNode(true);

obrazekPridat.addEventListener('click', event => {
  let novyRow = rowKopie.cloneNode(true);
  let obrazekOdebrat = new Image();
  obrazekOdebrat.src = "/public/img/minus-84.png";
  obrazekOdebrat.alt = "minus";

  novyRow.append(obrazekOdebrat);
  obrazekPridat.before(novyRow);
  
  obrazekOdebrat.addEventListener('click', event => {
    novyRow.remove();
  });
});

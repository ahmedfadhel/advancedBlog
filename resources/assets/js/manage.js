const accordion = document.getElementsByClassName('has-submenu')
const adminSideMenuButton = document.getElementById('admin-sidemenu-button')
const management = document.getElementById('app')
adminSideMenuButton.onclick = function() {
  this.classList.toggle('is-active')

  document.getElementById('admin-side-menu').classList.toggle('is-active')
  management.classList.toggle('is-active')
}

for (let i = 0; i< accordion.length; i++) {
  if(accordion[i].classList.contains('is-active')){
    const submenu = accordion[i].nextElementSibling;
    submenu.style.maxHeight = submenu.scrollHeight + 'px'
    submenu.style.marginTop = '0.75em'
    submenu.style.marginBottom = '0.75em'
  }
  accordion[i].onclick = function() {
    // this.classList.toggle('is-active')

    const submenu = this.nextElementSibling;

    if(submenu.style.maxHeight){
      submenu.style.maxHeight = null
      submenu.style.marginTop = null
      submenu.style.marginBottom = null
    }else {
      submenu.style.maxHeight = submenu.scrollHeight + 'px'
      submenu.style.marginTop = '0.75em'
      submenu.style.marginBottom = '0.75em'
    }
  }
  
}
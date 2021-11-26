require('./bootstrap');


bsCustomFileInput.init()

var btn = document.getElementById('file')
var form = document.querySelector('form')
if (btn)
btn.addEventListener('click', function() {
    form.reset()
})

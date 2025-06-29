<script src="public/default/js/bootstrap.min.js"></script>
<script src="public/default/js/mds.bs.datetimepicker.js"></script>
<script>
  // Password
  const edit_user_form = document.getElementById("edit-user-form")
  edit_user_form.addEventListener("submit", (e) => {
    e.preventDefault()
    const password_field_value = document.getElementById("pass").value
    const repassword_field_value = document.getElementById("repass").value
    if (password_field_value === repassword_field_value) {
      edit_user_form.submit()
    } else {
      alert("رمز عبور و تکرار آن مطابقت ندارد.")
    }
  })

  // Slider
  const myCarouselElement = document.querySelector('#locationSlider')
  if (myCarouselElement) {
    const carousel = new bootstrap.Carousel(myCarouselElement, {
      interval: 3000,
      touch: true
    })
  }

  // Date picker
  const birthday = document.querySelector('[data-name="dtp1-text"]').value;
  if (birthday) {
    const dtp1 = new mds.MdsPersianDateTimePicker(document.getElementById('dtp1'), {
      targetTextSelector: '[data-name="dtp1-text"]',
      targetDateSelector: '[data-name="dtp1-date"]',
      selectedDate: new Date(birthday),
      selectedDateToShow: new Date(birthday)
    });
  }
</script>

</body>

</html>
document.addEventListener('DOMContentLoaded', () => {
    class FormHandler {
        constructor(formElement) {
            this.form = formElement;
            this.obligatoryFields = this.form.querySelectorAll('.obligatory');
            this.submitting = false;
            this.setupEvents();
        }

        setupEvents() {
            this.form.addEventListener('submit', (e) => {
                e.preventDefault();
                if (!this.submitting) {
                    this.submitting = true;
                    this.removeError();
                    if (this.checkObligatoryFields()) {
                        this.submitForm();
                    } else {
                        this.submitting = false;
                    }
                } else {
                    console.log('Отправка данных уже запущена...');
                }
            });

            this.obligatoryFields.forEach(field => {
                field.addEventListener('input', (e) => {
                    if (e.target.value.trim() !== '') {
                        this.removeErrorForField(e.target);
                    } else {
                        this.showErrorForField(e.target, 'Необходимо написать какой-то адрес...');
                    }
                });
            });
        }

        removeErrorForField(field) {
            let error = field.nextElementSibling;
            if (error && error.classList.contains('error')) {
                error.remove();
            }
        }

        showErrorForField(field, errorMessage) {
            this.removeErrorForField(field);
            let error = this.generateError(errorMessage);
            field.insertAdjacentElement('afterend', error);
        }

        generateError(text) {
            let error = document.createElement('div');
            error.className = 'error';
            error.style.color = 'red';
            error.innerHTML = text;
            return error;
        }

        removeError() {
            let errors = this.form.querySelectorAll('.error');
            errors.forEach((error) => {
                error.remove();
            });
        }

        checkObligatoryFields() {
            let errorMessage = 'Поле не может быть пустым';
            let hasErrors = false;
            for (let i = 0; i < this.obligatoryFields.length; i++) {
                if (!this.obligatoryFields[i].value.trim()) {
                    let error = this.generateError(errorMessage);
                    this.obligatoryFields[i].insertAdjacentElement('afterend', error);
                    hasErrors = true;
                }
            }
            return !hasErrors;
        }

        async submitForm() {
            try {
                let formData = new FormData(this.form);
                let formId = this.form.id;
                if (formId === 'form_location') {
                    this.showSpiner(formId);
                    const response= await axios.post('/geolocations', formData);
                    this.insertData(response);
                    this.disabledSpiner(formId);
                    this.form.reset();
                }
            } catch (error) {
            } finally {
                this.submitting = false;
            }
        }

        disabledSpiner(formId) {
            let currentForm = document.getElementById(formId);
            let btnSubmit = currentForm.querySelector('.form-geolocation__btn')
            btnSubmit.innerHTML = 'Отправить'
            currentForm.querySelector('[type="submit"]').disabled = false;
            currentForm.querySelector('.submit-spinner').classList.add('submit-spinner_hide');
        }

        showSpiner(formId) {
            let currentForm = document.getElementById(formId);
            let btnSubmit = currentForm.querySelector('.form-geolocation__btn')
            btnSubmit.innerHTML = ''
            btnSubmit.disabled = true;
            currentForm.querySelector('.submit-spinner').classList.remove('submit-spinner_hide');
        }

        insertData(response) {
            document.getElementById('displayData').innerText = JSON.stringify(response.data, null, 2);
        }
    }

    if (document.querySelector('.form-location')) {
        let formLocation = document.querySelector('.form-location');
        let formHandlerOrder = new FormHandler(formLocation);
    }

})

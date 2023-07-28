<template>
    <div>
        <div
            v-if="message"
            class="alert alert-success"
            role="alert"
        >
            {{ message }}
        </div>

        <form @submit.prevent="submitForm">
            <div class="row mb-3">
                <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone number</label>

                <div class="col-md-6">
                    <input 
                        id="phone_number" 
                        type="text" 
                        class="form-control" 
                        name="phone_number" 
                        v-model="form.phone_number"
                        :class="errors.phone_number ? 'is-invalid' : ''"
                    >
                    
                    <span 
                        v-if="errors.phone_number"
                        class="invalid-feedback" 
                        role="alert"
                    >
                        <strong>{{ errors.phone_number[0] }}</strong>
                    </span>
                </div>
            </div>

            <div class="row mb-3">
                <label for="time" class="col-md-4 col-form-label text-md-end">Time</label>

                <div class="col-md-6">
                    <input
                        id="time"
                        type="text"
                        class="form-control"
                        name="time"
                        v-model="form.time"
                        :class="errors.time ? 'is-invalid' : ''"
                    >

                    <span 
                        v-if="errors.time"
                        class="invalid-feedback" 
                        role="alert"
                    >
                        <strong>{{ errors.time[0] }}</strong>
                    </span>
                </div>
            </div>

            <div class="row mb-3">
                <label for="text" class="col-md-4 col-form-label text-md-end">Text</label>

                <div class="col-md-6">
                    <textarea
                        id="text"
                        class="form-control"
                        name="text"
                        v-model="form.text"
                        :class="errors.text ? 'is-invalid' : ''"
                    ></textarea>

                    <span 
                        v-if="errors.text"
                        class="invalid-feedback" 
                        role="alert"
                    >
                        <strong>{{ errors.text[0] }}</strong>
                    </span>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        props: {
            route: String
        },
        data() {
            return {
                form: {
                    phone_number: "",
                    time: "",
                    text: ""
                },
                errors: {
                    phone_number: null,
                    time: null,
                    text: null
                },
                message: null
            };
        },  
        methods: {
            async submitForm() {
                const self = this;

                await self.resetMessage();
                await self.setErrors();

                await axios.post(self.route, self.form)
                    .then(function (response) {
                        self.resetForm();
                        self.message = response.data.message;
                    })
                    .catch(function (error) {
                        if (error.response && error.response.status === 422) {
                            self.setErrors(error.response.data.errors);
                        } else {
                            console.log('Error', error.message);
                        }
                    });
            },
            async setErrors(errorsObj = {phone_number: null, time: null, text: null}) {
                Object.assign(this.errors, errorsObj);
            },
            resetForm() {
                Object.assign(this.form, {phone_number: "", time: "", text: ""});
            },
            async resetMessage() {
                this.message = null;
            }
        }
    }
</script>

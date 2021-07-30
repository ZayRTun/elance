<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col col-sm-12 col-md-8 offset-md-2">
                <my-upload field="img"
                    @crop-success="cropSuccess"
                    v-model="show"
                    :width="128"
                    :height="128"
                    :no-rotate="false"
                    :no-square="true"
                    lang-type="en">
                </my-upload>

                <figure class="figure">
                    <img class="figure-img rounded-circle" :src="imgDataUrl">
                </figure>
                <a class="btn btn-outline-primary" @click="show = ! show">
                    <i class="fas fa-upload"></i> Upload Image
                </a>

                <form method="POST" @submit.prevent="onSubmit" @keydown="form.onKeydown($event)" class="mt-3">

                    <fieldset class="form-group">
                        <div class="form-row">
                            <legend>Complete your Profile</legend>

                            <div class="form-group col-md-6">
                                <label class="form-control-label" for="name">Name</label>
                                <input v-model="form.name" id="name" type="text" class="form-control" name="name" :class="{ 'is-invalid': form.errors.has('name') }">

                                <has-error :form="form" field="name"></has-error>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label" for="phone">Phone Number</label>
                                <input v-model="form.phone" id="phone" type="tel" class="form-control" name="phone" :class="{ 'is-invalid': form.errors.has('phone') }">

                                <has-error :form="form" field="phone"></has-error>
                            </div>

                            <div class="form-group col-md-12">
                                <div class="form-check form-check-inline">
                                    <input v-model="form.gender" class="form-check-input" type="radio" name="gender" id="male" value="male" :class="{ 'is-invalid': form.errors.has('gender') }">
                                    <label class="form-check-label" for="male">male</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input v-model="form.gender" class="form-check-input" type="radio" name="gender" id="female" value="female">
                                    <label class="form-check-label" for="female">female</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input v-model="form.gender" class="form-check-input" type="radio" name="gender" id="complicated" value="complicated">
                                    <label class="form-check-label" for="complicated">complicated</label>
                                </div>

                                <has-error :form="form" field="gender"></has-error>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label" for="proficiency">English language Proficiency</label>
                                <select class="custom-select" v-model="form.proficiency" name="proficiency" :class="{ 'is-invalid': form.errors.has('proficiency') }">
                                    <option disabled value="">Select a level</option>
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Upper Intermediate">Upper Intermediate</option>
                                    <option value="Advance">Advance</option>
                                </select>


                                <has-error :form="form" field="proficiency"></has-error>
                            </div>
                        </div> <!-- row -->

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-control-label">Service</label>
                                <select v-model="service" class="custom-select" name="service" @change="onChange" :class="{ 'is-invalid': form.errors.has('service') }">
                                    <option disabled value="">Select a service</option>
                                    <option v-for="service in services" :key="service.id" :value="{id: service.id, title: service.title}">{{service.title}}</option>
                                </select>

                                <has-error :form="form" field="service"></has-error>
                            </div>

                            <div v-if="subserviceDisplay" class="form-group col-md-6">
                                <label class="form-control-label">Category</label>
                                <select v-model="form.category" class="custom-select" name="subservice" :class="{ 'is-invalid': form.errors.has('subservice') }">
                                    <option disabled value="">Select a Subservice</option>
                                    <option v-for="subservice in subservices" :key="subservice.id" :value="subservice.category">{{subservice.category}}</option>
                                </select>

                                <has-error :form="form" field="subservice"></has-error>
                            </div>
                        </div> <!-- row -->
                    </fieldset>

                    <fieldset class="form-group">
                        <div class="form-row">
                            <legend>Education Background</legend>

                            <div class="form-group col-md-4">
                                <label class="form-control-label" for="degree">Degree</label>
                                <input v-model="form.degree" type="text" id="degree" class="form-control" name="degree" :class="{ 'is-invalid': form.errors.has('degree') }">

                                <has-error :form="form" field="degree"></has-error>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-control-label" for="university">University</label>
                                <input v-model="form.university" type="text" id="university" class="form-control" name="university" :class="{ 'is-invalid': form.errors.has('university') }">

                                <has-error :form="form" field="university"></has-error>
                            </div>

                            <div class="form-group col-sm-6 col-md-2">
                                <label class="form-control-label" for="from">From</label>
                                <input v-model="form.from" type="text" id="from" class="form-control" name="from" :class="{ 'is-invalid': form.errors.has('from') }">

                                <has-error :form="form" field="from"></has-error>
                            </div>

                            <div class="form-group col-sm-6 col-md-2">
                                <label class="form-control-label" for="to">To</label>
                                <input v-model="form.to" type="text" id="to" class="form-control" name="to" :class="{ 'is-invalid': form.errors.has('to') }">

                                <has-error :form="form" field="to"></has-error>
                            </div>
                        </div> <!-- row -->
                    </fieldset>

                    <fieldset class="form-group">
                        <legend>About You</legend>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="form-control-label" for="about">About</label>
                                <textarea v-model="form.about" id="about" class="form-control" name="about" rows="3" placeholder="Something about you to impress the clients" :class="{ 'is-invalid': form.errors.has('about') }"></textarea>

                                <has-error :form="form" field="about"></has-error>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="form-control-label" for="address">Address</label>
                                <textarea v-model="form.address" id="address" class="form-control" rows="3" name="address" placeholder="Your current address" :class="{ 'is-invalid': form.errors.has('address') }"></textarea>

                                <has-error :form="form" field="address"></has-error>
                            </div>
                        </div> <!-- row -->
                    </fieldset>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: false,
            imgDataUrl: '/img/user.png',
            service: {id: '', title: ''},
            services: [],
            subservices: [],
            subserviceDisplay: false,
            form: new Form({
                name: '',
                gender: '',
                proficiency: '',
                service: '',
                category: null,
                degree: '',
                university: '',
                from: '',
                to: '',
                about: '',
                address: '',
                image: ''
            })
        }
    },

    methods: {
        cropSuccess(imgDataUrl, field) {
            this.imgDataUrl = imgDataUrl;
            this.form.image = imgDataUrl;
        },

        onChange() {
            this.form.service = this.service.title;

            axios.get('/api/elancer/services/' + this.service.id)
                .then(respond => {
                    this.subservices = respond.data;
                    this.subserviceDisplay = true;
                })
        },
        onSubmit() {
            let self = this;
            this.form.post('/api/elancer/create')
                .then(respond => {
                    const status = respond.data.status;

                    if (status === 200) {
                        window.location = respond.data.redirect;
                    }
                })

        }
    },

    created() {
        axios.get('/api/elancer/create')
            .then(respond => {
                this.services = respond.data;
            })
    }
}
</script>

<style>
    legend {
        border-bottom: 1px solid #05ffe1;
    }
</style>

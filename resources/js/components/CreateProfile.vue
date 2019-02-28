<template>
    <div class="columns">
        <div class="column is-12-mobile is-8-tablet is-offset-2-tablet">
            <div class="box">
                <my-upload field="img"
                    @crop-success="cropSuccess"
                    v-model="show"
                    :width="128"
                    :height="128"
                    :no-rotate="false"
                    :no-square="true"
                    lang-type="en">
                </my-upload>

                <div class="content">
                    <form method="POST" @submit.prevent="onSubmit" @keydown="form.onKeydown($event)">

                        <div class="field">
                            <figure class="image is-128x128 is-marginless">
                                <img id="preview" class="is-rounded" :src="imgDataUrl">
                            </figure>
                        </div>

                        <div class="field">
                            <a class="button is-primary" @click="show = ! show">Upload Image</a>
                        </div>

                        <h1 class="subtitle is-4 ">Complete your Profile</h1>

                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input v-model="form.name" type="text" class="input" name="name" :class="{ 'is-danger': form.errors.has('name') }">
                            </div>

                            <div class="has-text-danger is-size-7">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                        </div>

                        <!-- gender -->
                        <div class="field is-grouped">
                            <div class="control is-expanded">
                                <label class="radio">
                                    <input v-model="form.gender" type="radio" name="gender" value="male">
                                    male
                                </label>

                                <label class="radio">
                                    <input v-model="form.gender" type="radio" name="gender" value="female">
                                    female
                                </label>

                                <label class="radio">
                                    <input v-model="form.gender" type="radio" name="gender" value="complicated">
                                    complicated
                                </label>

                                <div class="has-text-danger is-size-7">
                                    <has-error :form="form" field="gender"></has-error>
                                </div>
                            </div>

                            <div class="control is-expanded">
                                <label class="label">Phone Number</label>
                                <input v-model="form.phone" type="tel" class="input" name="phone" :class="{ 'is-danger': form.errors.has('phone') }">

                                <div class="has-text-danger is-size-7">
                                    <has-error :form="form" field="phone"></has-error>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">English language Proficiency</label>
                            <div class="control">
                                <div class="select">
                                    <select v-model="form.proficiency" name="proficiency">
                                        <option disabled value="">Select a level</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Upper Intermediate">Upper Intermediate</option>
                                        <option value="Advance">Advance</option>
                                    </select>
                                </div>

                                <div class="has-text-danger is-size-7">
                                    <has-error :form="form" field="proficiency"></has-error>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Service</label>
                            <div class="control">
                                <div class="select">
                                    <select v-model="service" name="service" @change="onChange" :class="{ 'is-danger': form.errors.has('service') }">
                                        <option disabled value="">Select a service</option>
                                        <option v-for="service in services" :key="service.id" :value="{id: service.id, title: service.title}">{{service.title}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="has-text-danger is-size-7">
                                <has-error :form="form" field="service"></has-error>
                            </div>
                        </div>

                        <div v-if="subserviceDisplay" class="field">
                            <label class="label">Category</label>
                            <div class="control">
                                <div class="select">
                                    <select v-model="form.category" name="subservice" :class="{ 'is-danger': form.errors.has('subservice') }">
                                        <option disabled value="">Select a Subservice</option>
                                        <option v-for="subservice in subservices" :key="subservice.id" :value="subservice.category">{{subservice.category}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="has-text-danger is-size-7">
                                <has-error :form="form" field="subservice"></has-error>
                            </div>
                        </div>

                        <h1 class="subtitle is-4">Education</h1>

                        <div class="field is-grouped">
                            <div class="control is-expanded">
                                <label class="label">Degree</label>
                                <input v-model="form.degree" type="text" class="input" name="degree" :class="{ 'is-danger': form.errors.has('degree') }">

                                <div class="has-text-danger is-size-7">
                                    <has-error :form="form" field="degree"></has-error>
                                </div>
                            </div>

                            <div class="control is-expanded">
                                <label class="label">University</label>
                                <input v-model="form.university" type="text" class="input" name="university" :class="{ 'is-danger': form.errors.has('university') }">

                                <div class="has-text-danger is-size-7">
                                    <has-error :form="form" field="university"></has-error>
                                </div>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control is-expanded">
                                <label class="label">From</label>
                                <input v-model="form.from" type="text" class="input" name="from" :class="{ 'is-danger': form.errors.has('from') }">

                                <div class="has-text-danger is-size-7">
                                    <has-error :form="form" field="from"></has-error>
                                </div>
                            </div>

                            <div class="control is-expanded">
                                <label class="label">To</label>
                                <input v-model="form.to" type="text" class="input" name="to" :class="{ 'is-danger': form.errors.has('to') }">

                                <div class="has-text-danger is-size-7">
                                    <has-error :form="form" field="to"></has-error>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">About</label>
                            <textarea v-model="form.about" class="textarea" name="about" placeholder="Something about you to impress the clients" :class="{ 'is-danger': form.errors.has('about') }"></textarea>

                            <div class="has-text-danger is-size-7">
                                <has-error :form="form" field="about"></has-error>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Address</label>
                            <textarea v-model="form.address" class="textarea" name="address" placeholder="Your current address" :class="{ 'is-danger': form.errors.has('address') }"></textarea>

                            <div class="has-text-danger is-size-7">
                                <has-error :form="form" field="address"></has-error>
                            </div>
                        </div>

                        <button type="submit" class="button is-primary">Submit</button>
                    </form>
                </div>

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

</style>

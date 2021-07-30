<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col col-lg-3 d-none d-lg-block">
                <ul class="list-unstyled text-right">
                    <li class="list-item mb-1">
                        <div class="card rounded-0 border-top-0 border-bottom-0 border-right-0 " :class="[step === 0 ? classActive : classDisabled]">
                            <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                <span>
                                    <i class="cIcon fas fa-pen"></i>Title
                                </span>

                                <i class="fas fa-check-circle" :class="{ 'text-primary' : pages[0].completed }"></i>
                            </div>
                        </div>
                    </li>

                    <li class="list-item mb-1">
                        <div class="card rounded-0 border-top-0 border-bottom-0 border-right-0 " :class="[step === 1 ? classActive : classDisabled]">
                            <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                <span>
                                    <i class="cIcon fas fa-file-alt"></i>Description
                                </span>

                                <i class="fas fa-check-circle" :class="{ 'text-primary' : pages[1].completed }"></i>
                            </div>
                        </div>
                    </li>

                    <li class="list-item mb-1">
                        <div class="card rounded-0 border-top-0 border-bottom-0 border-right-0 " :class="[step === 2 ? classActive : classDisabled]">
                            <div class="card-body p-2 d-flex justify-content-between align-items-center ">
                                <span>
                                    <i class="cIcon fas fa-tasks"></i>Details
                                </span>

                                <i class="fas fa-check-circle" :class="{ 'text-primary' : pages[2].completed }"></i>
                            </div>
                        </div>
                    </li>

                    <li class="list-item mb-1">
                        <div class="card rounded-0 border-top-0 border-bottom-0 border-right-0 " :class="[step === 3 ? classActive : classDisabled]">
                            <div class="card-body p-2 d-flex justify-content-between align-items-center ">
                                <span>
                                    <i class="cIcon fas fa-pencil-ruler"></i>Expertise
                                </span>

                                <i class="fas fa-check-circle" :class="{ 'text-primary' : pages[3].completed }"></i>
                            </div>
                        </div>
                    </li>

                    <li class="list-item mb-1">
                        <div class="card rounded-0 border-top-0 border-bottom-0 border-right-0 " :class="[step === 4 ? classActive : classDisabled]">
                            <div class="card-body p-2 d-flex justify-content-between align-items-center ">
                                <span>
                                    <i class="cIcon fas fa-dollar-sign"></i>Budget
                                </span>

                                <i class="fas fa-check-circle" :class="{ 'text-primary' : pages[4].completed }"></i>
                            </div>
                        </div>
                    </li>

                    <li class="list-item mb-1">
                        <div class="card rounded-0 border-top-0 border-bottom-0 border-right-0 " :class="[step === 5 ? classActive : classDisabled]">
                            <div class="card-body p-2 d-flex justify-content-between align-items-center ">
                                <span>
                                    <i class="cIcon far fa-eye"></i>Review
                                </span>

                                <!-- <i class="fas fa-check-circle" :class="{ 'text-primary' : pages[5].completed }"></i> -->
                            </div>
                        </div>
                    </li>

                </ul>
            </div>

            <div class="col col-sm-12 col-lg-9">

                <form method="POST" @submit.prevent="submit" @keydown="form.onKeydown($event)" @change="validate()" @keyup="validate()">

                    <!-- step 1 -->
                    <div v-if="step === 0" class="card border-0">
                        <div class="card rounded-0 shadow-sm">

                            <div class="card-header bg-light">
                                <p class="h3 mb-0">Get Started</p>
                                <span class="small">Step 1 of 6</span>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-control-label " for="title">Enter the name of your job post</label>
                                    <textarea v-model="form.title" id="title" class="form-control rounded-0" name="title" rows="2" :class="{ 'is-invalid': form.errors.has('title') }"></textarea>

                                    <has-error :form="form" field="title"></has-error>
                                </div>

                                <p class="card-subtitle font-weight-bold">Here are some good examples:</p>

                                <ul class="card-body pt-0">
                                    <li class="list-item">Developer needed for creating a responsive WordPress Theme</li>
                                    <li class="list-item">CAD designer to create a 3D model of a residential building</li>
                                    <li class="list-item">Need a design for a new company logo</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card rounded-0 shadow-sm mt-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-control-label">Select a Job category</label>
                                    <select v-model="service" class="custom-select rounded-0" name="service" @change="onServiceSelected" :class="{ 'is-invalid': form.errors.has('service') }">
                                        <option disabled value="">Select a category</option>
                                        <option v-for="service in services" :key="service.id" :value="{id: service.id, title: service.title}">{{service.title}}</option>
                                    </select>

                                    <has-error :form="form" field="service"></has-error>
                                </div>

                                <div class="form-group">
                                    <div v-if="subserviceDisplay" class="form-group">
                                        <label class="form-control-label">Select a Subcategory</label>
                                        <select v-model="subService" class="custom-select rounded-0" name="subservice" @change="onSubServiceSelected" :class="{ 'is-invalid': form.errors.has('subservice') }">
                                            <option disabled value="">Select a Subservice</option>
                                            <option v-for="subservice in subservices" :key="subservice.id" :value="{id: subservice.id, category: subservice.category}">{{subservice.category}}</option>
                                        </select>

                                        <has-error :form="form" field="subservice"></has-error>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div v-if="updateMode" class="row">
                                    <div class="col col-3">
                                        <button type="button" class="btn btn-outline-secondary btn-light btn-block border-0 shadow-sm rounded-0" @click="cancelUpdate">Cancel</button>
                                    </div>

                                    <div class="col col-3">
                                        <button type="button" class="btn btn-outline-primary btn-light btn-block border-0 shadow-sm rounded-0" @click="updateJob(1)" :disabled="!this.pages[this.step].completed">Update</button>
                                    </div>
                                </div>

                                <div v-else class="row">
                                    <div class="col col-3">
                                        <button type="button" class="btn btn-outline-secondary btn-light btn-block border-0 shadow-sm rounded-0">Exit</button>
                                    </div>

                                    <div class="col col-3">
                                        <button type="button" class="btn btn-outline-primary btn-light btn-block border-0 shadow-sm rounded-0" @click="next" :disabled="!this.pages[this.step].completed">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div v-if="step === 1" class="card border-0">
                        <div class="card rounded-0 shadow-sm">
                            <div class="card-header bg-light">
                                <p class="h3 mb-0">Description</p>
                                <span class="small">Step 2 of 6</span>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-control-label" for="description">Describe your Job</label>
                                    <textarea v-model="form.description" id="description" class="form-control rounded-0" name="description" rows="2" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>

                                    <has-error :form="form" field="description"></has-error>
                                </div>

                                <p class="card-subtitle font-weight-bold">A good description includes:</p>

                                <ul class="card-body pt-0">
                                    <li class="list-item">What the deliverable is</li>
                                    <li class="list-item">Type of freelancer you're looking for</li>
                                    <li class="list-item">Anything unique about the project or team</li>
                                </ul>
                            </div>

                            <dropFile></dropFile>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col col-3">
                                        <button type="button" class="btn btn-outline-primary btn-light btn-block border-0 shadow-sm rounded-0" @click="prev">Prev</button>
                                    </div>

                                    <div class="col col-3">
                                        <button type="button" class="btn btn-outline-primary btn-light btn-block border-0 shadow-sm rounded-0" @click="next" :disabled="!this.pages[this.step].completed">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div v-if="step === 2" class="card border-0">
                        <div class="card rounded-0 shadow-sm">
                            <div class="card-header bg-light">
                                <p class="h3 mb-0">Details</p>
                                <span class="small">Step 3 of 6</span>
                            </div>
                            <div class="card-body">
                                <p class="card-subtitle font-weight-bold mb-1">What type of project do you have?</p>

                                <div class="row">
                                    <customRadio project-type="One-time project" v-model:typeSelected="form.job_type">
                                        <i slot="cardIcon" class="fas fa-user-clock text-left d-sm-block text-sm-center h2 mx-2 mb-sm-4"></i>
                                    </customRadio>

                                    <customRadio project-type="Ongoing project" v-model:typeSelected="form.job_type">
                                        <i slot="cardIcon" class="fas fa-file-signature text-left d-sm-block text-sm-center h2 mx-2 mb-sm-4"></i>
                                    </customRadio>

                                    <customRadio project-type="I am not sure" v-model:typeSelected="form.job_type">
                                        <i slot="cardIcon" class="fas fa-question-circle text-left d-sm-block text-sm-center h2 mx-2 mb-sm-4"></i>
                                    </customRadio>
                                </div>
                            </div>
                        </div>

                        <div class="card rounded-0 shadow-sm mt-4">
                            <div class="card-header bg-white border-0">
                                <p class="card-title h5">Additional Options (Optional)</p>
                            </div>

                            <div class="card-body">
                                <p class="card-subtitle mb-3 h6">Add upto<span class="font-weight-bold"> 5</span> screening questions</p>

                                <div class="card-text mb-2">
                                    <div v-for="q in questions">
                                        <div v-if="q.question.length > 0" class="row px-2 d-flex align-items-center">
                                            <div class="col-10" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <span class="text-primary">{{`Q-${q.id}: `}}</span> {{q.question}}
                                            </div>

                                            <div class="col-2">
                                                <button type="button" class="btn btn-outline-secondary border-0 rounded-0" @click="removeQuestion(q)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div v-if="!displayQustionInput && !maxNumOfQuestion"  class="d-inline text-primary">
                                    <i class="fas fa-plus"></i>
                                    <span class="btn-link font-weight-bold" style="cursor: pointer;" @click="toggleQuestionInput">
                                        <span class="mx-2">Add</span>
                                    </span>
                                </div>

                                <questionInput v-bind:question-index="questionIndex" v-bind:question-field="questionField" v-if="displayQustionInput" @addQuestion="addThisQuestion"></questionInput>

                                <div class="mt-2">
                                    <p v-if="this.form.errors.errors.hasOwnProperty('question_1')" class="text-danger mb-0">{{this.form.errors.errors.question_1.toString()}}</p>
                                    <p v-if="this.form.errors.errors.hasOwnProperty('question_2')" class="text-danger mb-0">{{this.form.errors.errors.question_2.toString()}}</p>
                                    <p v-if="this.form.errors.errors.hasOwnProperty('question_3')" class="text-danger mb-0">{{this.form.errors.errors.question_3.toString()}}</p>
                                    <p v-if="this.form.errors.errors.hasOwnProperty('question_4')" class="text-danger mb-0">{{this.form.errors.errors.question_4.toString()}}</p>
                                    <p v-if="this.form.errors.errors.hasOwnProperty('question_5')" class="text-danger mb-0">{{this.form.errors.errors.question_5.toString()}}</p>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col col-3">
                                        <button type="button" class="btn btn-outline-primary btn-light btn-block border-0 shadow-sm rounded-0" @click="prev">Prev</button>
                                    </div>

                                    <div class="col col-md-3">
                                        <button type="button" class="btn btn-outline-primary btn-light btn-block border-0 shadow-sm rounded-0" @click="next" :disabled="!this.pages[this.step].completed">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div v-if="step === 3" class="card border-0">
                        <div class="card rounded-0 shadow-sm">
                            <div class="card-header bg-light">
                                <p class="h3 mb-0">Experties</p>
                                <span class="small">Step 4 of 6</span>
                            </div>

                            <div class="card-body">
                                <p class="card-subtitle font-weight-bold mb-1">What skills and expertise are most important to you?</p>

                                <!-- <button v-for="skill in skills" :key="skill.id" :class="[skill.state ? skillSelectedState : skillNotSelectedState]" class="btn btn-sm m-2" :value="skill.category" @click.prevent="addSkill(skill)">{{skill.skills}}</button> -->
                                <button v-for="skill in skills" :key="skill.id" :class="[skill.state ? skillSelectedState : skillNotSelectedState]" class="btn btn-sm m-2 custom-btn" :value="skill.category" @click="selectCurrent(skill)">{{skill.category}}</button>

                                <clientInput v-bind:current-skill="subService.id" @userSelectedASkill="addUserSkill"></clientInput>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col col-3">
                                        <button type="button" class="btn btn-outline-primary btn-light btn-block border-0 shadow-sm rounded-0" @click="prev">Prev</button>
                                    </div>

                                    <div class="col col-md-3">
                                        <button type="button" class="btn btn-outline-primary btn-light btn-block border-0 shadow-sm rounded-0" @click="next" :disabled="!this.pages[this.step].completed">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div v-if="step === 4" class="card border-0">
                        <div class="card rounded-0 shadow-sm">
                            <div class="card-header bg-light">
                                <p class="h3 mb-0">Budget</p>
                                <span class="small">Step 5 of 6</span>
                            </div>

                            <div class="card-body">
                                <p class="card-subtitle font-weight-bold mb-1">What level of experience should your freelancer have?</p>

                                <div class="row">

                                    <customRadio project-type="Entry" v-model:typeSelected="form.experience_level">
                                        <span slot="cardIcon" class="d-flex justify-content-center float-left float-sm-none ">
                                            <i class="fas fa-dollar-sign d-sm-block text-sm-center h2 mb-sm-4" style="margin: 0 3px"></i>
                                        </span>
                                    </customRadio>

                                    <customRadio project-type="Intermediate" v-model:typeSelected="form.experience_level">
                                        <span slot="cardIcon" class="d-flex justify-content-center float-left float-sm-none ">
                                            <i class="fas fa-dollar-sign d-sm-block text-sm-center h2 mb-sm-4" style="margin: 0 3px"></i>
                                            <i class="fas fa-dollar-sign d-sm-block text-sm-center h2 mb-sm-4" style="margin: 0 3px"></i>
                                        </span>
                                    </customRadio>

                                    <customRadio project-type="Expert" v-model:typeSelected="form.experience_level">
                                        <span slot="cardIcon" class="d-flex justify-content-center float-left float-sm-none ">
                                            <i class="fas fa-dollar-sign d-sm-block text-sm-center h2 mb-sm-4" style="margin: 0 3px"></i>
                                            <i class="fas fa-dollar-sign d-sm-block text-sm-center h2 mb-sm-4" style="margin: 0 3px"></i>
                                            <i class="fas fa-dollar-sign d-sm-block text-sm-center h2 mb-sm-4" style="margin: 0 3px"></i>
                                        </span>
                                    </customRadio>
                                </div>
                            </div>

                            <div class="card-body">
                                <p class="card-subtitle font-weight-bold mb-1">How long do you expect the project to last?</p>

                                <div class="row">
                                    <customRadio project-type="Less than 1 month" v-model:typeSelected="form.expected_duration">
                                        <span slot="cardIcon" class="d-flex justify-content-center float-left float-sm-none ">
                                            <i class="far fa-calendar d-sm-block text-sm-center h2 mb-sm-4" style="margin: 0 3px"></i>
                                        </span>
                                    </customRadio>

                                    <customRadio project-type="1 to 3 months" v-model:typeSelected="form.expected_duration">
                                        <span slot="cardIcon" class="d-flex justify-content-center float-left float-sm-none ">
                                            <i class="far fa-calendar d-sm-block text-sm-center h2 mb-sm-4" style="margin: 0 3px"></i>
                                        </span>
                                    </customRadio>

                                    <customRadio project-type="3 to 6 months" v-model:typeSelected="form.expected_duration">
                                        <span slot="cardIcon" class="d-flex justify-content-center float-left float-sm-none ">
                                            <i class="far fa-calendar d-sm-block text-sm-center h2 mb-sm-4" style="margin: 0 3px"></i>
                                        </span>
                                    </customRadio>

                                    <customRadio project-type="More than 6 months" v-model:typeSelected="form.expected_duration">
                                        <span slot="cardIcon" class="d-flex justify-content-center float-left float-sm-none ">
                                            <i class="far fa-calendar d-sm-block text-sm-center h2 mb-sm-4" style="margin: 0 3px"></i>
                                        </span>
                                    </customRadio>
                                </div>
                            </div>


                            <div class="card-footer">
                                <div class="row">
                                    <div class="col col-3">
                                        <button type="button" class="btn btn-outline-primary btn-light btn-block border-0 shadow-sm rounded-0" @click="prev">Prev</button>
                                    </div>

                                    <div class="col col-md-3">
                                        <button type="button" class="btn btn-outline-primary btn-light btn-block border-0 shadow-sm rounded-0" @click="next" :disabled="!this.pages[this.step].completed">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 6 -->
                    <div v-if="step === 5" class="card border-0">
                        <!-- Title -->
                        <div class="card rounded-0 shadow-sm">
                            <div class="card-header bg-light">
                                <p class="h3 mb-0">Review and post</p>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-between mb-3">
                                        <div class="card-title h3">Title</div>

                                        <button type="button" class="btn rounded-circle shadow-sm text-primary job-edit-btn" @click="editJob(1)">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </div>

                                    <div class="col-12">
                                        <div class="card-title font-weight-bold">Job post name</div>
                                        <p>{{form.title}}</p>
                                    </div>

                                    <div class="col-12">
                                        <div class="card-title font-weight-bold">Job category</div>
                                        <p>{{form.title}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="card rounded-0 shadow-sm mt-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-between mb-3">
                                        <div class="card-title h3">Description</div>

                                        <button type="button" class="btn rounded-circle shadow-sm text-primary job-edit-btn">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </div>

                                    <div class="col-12">
                                        <div class="card-title font-weight-bold">Job description</div>
                                        <p>{{form.description}}</p>
                                    </div>

                                    <div class="col-12">
                                        <div class="card-title font-weight-bold">Project files</div>

                                        <ul class="list-group list-unstyled mb-1">
                                            <li v-for="file in files" class="list-item" :key="file.name">
                                                <i class="fas fa-paperclip"></i>
                                                {{file.name + ' (' + file.getSize() + ' KB' + ')' }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Details -->
                        <div class="card rounded-0 shadow-sm mt-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-between mb-3">
                                        <div class="card-title h3">Details</div>

                                        <button type="button" class="btn rounded-circle shadow-sm text-primary job-edit-btn">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </div>

                                    <div class="col-12">
                                        <div class="card-title font-weight-bold">Type of project</div>
                                        <p>{{form.job_type}}</p>
                                    </div>

                                    <div class="col-12">
                                        <div class="card-title font-weight-bold">Screening question</div>

                                        <div class="card-text mb-2">
                                            <div v-for="q in questions">
                                                <div v-if="q.question.length > 0" class="row px-2 d-flex align-items-center">
                                                    <div class="col-10" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        <span class="text-primary">{{`Q-${q.id}: `}}</span> {{q.question}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Experties -->
                        <div class="card rounded-0 shadow-sm mt-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-between mb-3">
                                        <div class="card-title h3">Skills and experties</div>

                                        <button type="button" class="btn rounded-circle shadow-sm text-primary job-edit-btn">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </div>

                                    <div class="col-12">
                                        <div class="card-title font-weight-bold">Selected skills</div>
                                        <p>{{form.skills}}</p>
                                    </div>

                                    <div v-if='form.client_added_skills.length > 0' class="col-12">
                                        <div class="card-title font-weight-bold">Additional skills</div>

                                        <div class="card-text mb-2">
                                            {{form.client_added_skills}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Budget -->
                        <div class="card rounded-0 shadow-sm mt-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-between mb-3">
                                        <div class="card-title h3">Budget</div>

                                        <button type="button" class="btn rounded-circle shadow-sm text-primary job-edit-btn">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </div>

                                    <div class="col-12">
                                        <div class="card-title font-weight-bold">Level of experience</div>
                                        <p>{{form.experience_level}}</p>
                                    </div>

                                    <div class="col-12">
                                        <div class="card-title font-weight-bold">Expected duration</div>

                                        <div class="card-text mb-2">
                                            {{form.expected_duration}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col col-3">
                                        <button type="button" class="btn btn-outline-primary btn-light btn-block border-0 shadow-sm rounded-0" @click="prev">Save & exit</button>
                                    </div>

                                    <div class="col col-md-3">
                                        <button type="button" class="btn btn-outline-primary btn-light btn-block border-0 shadow-sm rounded-0" @click="submit">Post job</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import customRadio from './CustomRadio.vue'
    import questionInput from './QuestionInputComponent.vue'
    import clientInput from './ClientSkillInput.vue'
    import dropFile from './DropFile.vue'

    export default {
        props: ['draftId'],

        components: { customRadio, questionInput, clientInput, dropFile },

        data() {
            return {
                // general pages field
                pages: [
                    {id: 1, disable: true, fields: ['title', 'service', 'category'], completed: false},
                    {id: 2, disable: true, fields: ['description'], completed: false},
                    {id: 3, disable: true, fields: ['job_type'], completed: false},
                    {id: 4, disable: true, fields: [], completed: false},
                    {id: 5, disable: true, fields: ['experience_level', 'expected_duration'], completed: false},
                    {id: 6, disable: true, fields: [], completed: false},
                ],

                step: 1,
                show: false,

                // questions
                questions: [
                    {id: 1, field: 'question_1', question: ''},
                    {id: 2, field: 'question_2', question: ''},
                    {id: 3, field: 'question_3', question: ''},
                    {id: 4, field: 'question_4', question: ''},
                    {id: 5, field: 'question_5', question: ''}
                ],
                questionIndex: 0,
                questionField: '',
                maxNumOfQuestion: false,
                displayQustionInput: false,
                questionCounter: 0,

                // classes

                textMuted: 'text-muted',
                textDanger: 'text-danger',
                classActive: 'border-primary text-primary shadow-sm font-weight-bold',
                classDisabled: 'border-0 text-dard',
                skillNotSelectedState: 'btn-secondary text-white',
                skillSelectedState: 'btn-primary',

                errors: false,

                // services & skills
                service: {id: '', title: ''},
                services: null,
                subService: {id: '', category: ''},
                subservices: [],
                subserviceDisplay: false,
                skills: [],
                selectedSkills: [],
                userProvidedSkills: [],
                // clientAddedSkills: '',

                // Update
                updateMode: false,

                form: new Form({
                    id: '',
                    title: '',
                    service: {},
                    category: {},
                    description: '',
                    job_type: 'One-time project',
                    question_1: null,
                    question_2: null,
                    question_3: null,
                    question_4: null,
                    question_5: null,
                    skills: '',
                    client_added_skills: '',
                    experience_level: 'Entry',
                    expected_duration: 'Less than 1 month',
                    job_post_completed: 0,
                    files: [],
                    current_page: '',
                })
            }
        },

        methods: {
            cancelUpdate() {
                this.updateMode = false;
                this.step = 5;
            },

            updateJob() {
                this.form.patch('/api/updatejob/up'+ (this.step + 1))
                    .then(response => {

                    })
                    .catch()
            },

            editJob(step) {
                this.updateMode = true;
                this.step = step - 1;
            },

            addUserSkill(skills) {
                this.form.client_added_skills = skills;
            },

            selectCurrent(skill) {
                if (!skill.state) {
                    this.selectedSkills.push(skill.category);
                    skill.state = true;
                    this.form.skills = this.selectedSkills.join(', ');
                } else {
                    let position = this.selectedSkills.indexOf(skill.category);
                    this.selectedSkills.splice(position, 1);
                    skill.state = false;
                    this.form.skills = this.selectedSkills.join(', ');
                }
            },

            removeQuestion(q) {
                q.question = '';
                this.form[q.field] = '';

                this.questionCounter--;

                if (this.questionCounter < 5) {
                    this.maxNumOfQuestion = false;
                }
            },

            toggleQuestionInput() {
                for(let i = 0; i < this.questions.length; i++) {
                    if (this.questions[i].question.length == 0) {
                        this.questionIndex = this.questions[i].id;
                        this.questionField = this.questions[i].field;
                        break;
                    }
                }
                this.displayQustionInput = !this.displayQustionInput;
            },

            addThisQuestion(index, value, field) {
                this.questionCounter++;

                this.questions[index - 1].question = value;
                this.form[field] = value;

                this.displayQustionInput = false;

                if (this.questionCounter === 5) {
                    this.maxNumOfQuestion = true;
                }
            },



            prev() {
                this.step--;
                this.pages.forEach(page => {
                    if (page.id !== this.step) {
                        page.disable = true;
                    } else {
                        page.disable = false;
                    }
                });

                this.validate();
            },

            next() {
                this.form.current_page = this.step + 1;

                this.form.post('/api/jobs/s' + (this.step + 1))
                    .then(respond => {
                        const status = respond.data.status;

                        if (status === 200) {

                            this.form.id = respond.data.draftId;

                            this.step++;
                            this.pages.forEach(page => {
                                if (page.id !== this.step) {
                                    page.disable = true;
                                } else {
                                    page.disable = false;
                                }
                            });

                            this.validate();
                        }
                    })
                    .catch(errors => {
                        if (this.step === 1) {
                            let eBag = this.form.errors.errors;
                            if (eBag.hasOwnProperty('files.0') || eBag.hasOwnProperty('files.1') || eBag.hasOwnProperty('files.2')) {
                                this.fileUploadError = true;
                            }
                        }
                    })
            },

            validate(data = this.pages[this.step]) {
                let validation = data.fields.every(field => {
                    if (field === 'service' || field === 'category') {
                        return ! _.isEmpty(this.form[field]);
                    }
                    return  this.form[field].length > 0;
                });

                if (validation) {
                    this.pages[this.step].completed = true;
                } else {
                    this.pages[this.step].completed = false;
                }
            },

            onServiceSelected() {
                Object.assign(this.form.service, this.service)
                // this.form.service.title = this.service.title;

                axios.get('/api/elancer/services/' + this.service.id)
                    .then(respond => {
                        this.subservices = respond.data;
                        this.subserviceDisplay = true;
                    })
            },

            onSubServiceSelected() {
                Object.assign(this.form.category, this.subService);
                // this.form.category = this.subService.category;

                axios.get('/api/elancer/services/' + this.subService.id)
                    .then(respond => {
                        let results = respond.data;
                        results.forEach(res => {
                            Vue.set(res, 'state', false)
                        });

                        this.skills = respond.data;
                    });
            },

            submit() {
                this.form.job_post_completed = true;

                this.form.post('/api/jobs/' + this.form.id)
                    .then(respond => {
                        const status = respond.data.status;

                        if (status === 200) {

                            window.location = respond.data.redirect;
                        }
                    })

            },

            initiateForm() {
                axios.get('/api/elancer/create')
                    .then(respond => {
                        // console.log(respond.data);
                        this.services = respond.data;
                    })
                    .catch()
            },

            // Draft methods
            loadDraft(data) {
                data.service = JSON.parse(data.service);
                data.category = JSON.parse(data.category);

                for (let key in data) {
                    if (key in this.form) {

                        if (key === 'service') {
                            this.service.id = data.service.id;
                            this.service.title = data.service.title;

                            this.onServiceSelected();
                        } else if (key === 'category') {

                            this.subService.id = data.category.id;
                            this.subService.category = data.category.category;

                            this.onSubServiceSelected();
                            this.validate();
                        }

                        this.form[key] = data[key];
                    } else {
                    }
                }
            },
        },

        created() {
            Event.$on('Files Ready', files => {
                console.log(`Length of uploaded: ${files.length}`);
                // console.log('Promises');
            });

            this.validate();

            if (this.draftId === 0) {

                this.initiateForm();
            } else {
                this.initiateForm();

                axios.get('/api/draft/' + this.draftId)
                    .then(response => {
                        this.loadDraft(response.data);
                    })
                    .catch()
            }
        }
}
</script>

<style scoped>
    .job-edit-btn:hover {
        box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.4) !important;
    }


    .custom-btn:focus {box-shadow: none;}
    .cIcon {width: 2rem; text-align: left;}

    .deleteFile:hover {cursor: pointer;}



    .rBox {
	    background: green;
	    width: 100px;
	    height: 100px;
	    text-align: center;
	    margin: 0 5px;
	    box-shadow: 0px 0px 2px 2px grey;
	}
	.rBox:hover {
    	background: #08ee08;
	}
</style>

<template>
    <div class="row">
        <div class="col-8">
            <input v-model="question" class="form-control rounded-0" type="text" @keyup="validateQuestion($event.target.value.length)" maxlength="256">
            <div class="d-flex justify-content-between">
                <p class="card-subtitle text-right mt-1 text-muted d-inline">maximum {{counter}} characters</p>
                <p v-if="limitReached" class="card-subtitle text-left mt-1 text-danger d-inline">You've reached maximun length !</p>
            </div>
        </div>

        <div class="col-4 px-0">
            <button type="button" class="btn btn-outline-primary border-0 rounded-0" @click="addQuestion">
                <i class="fas fa-plus"></i> Add question
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['questionIndex', 'questionField'],
        data() {
            return {
                question: '',
                max: 256,
                counter: 256,
                limitReached: false,
            }
        },

        methods: {
            addQuestion() {
                this.$emit('addQuestion', this.questionIndex, this.question, this.questionField);
            },

            validateQuestion(e) {
                this.counter = 256;
                this.counter -= e;
                if (e === this.max) {
                    this.limitReached = true;
                    setTimeout(() => {
                        this.limitReached = false;
                    }, 3000)
                }
            },
        },
    }
</script>

<style>

</style>

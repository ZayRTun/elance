<template>
    <div class="mt-2">
        <label class="d-block">Not what you're looking for?</label>
        <div class="container-fluid customWraper">
            <div class="row d-flex">

                <div v-if="userProvidedSkills.length > 0" class="col-auto d-flex flex-wrap col-pad-0">
                    <ul class="list-inline" style="margin:10px 0 0 0;">

                        <li v-for="(skill, i) in userProvidedSkills" :key="i" class="list-inline-item custom-list-inline">
                            <button type="button" class="btn btn-secondary text-white btn-sm userSkillbox custom-btn">
                                {{skill}}
                                <button class="userSkillboxBtn btn btn-sm border-0 text-white p-0 px-1 custom-btn" @click="removeThisSkill(i)">
                                    <i class="fas fa-times" style="font-size: .75rem"></i>
                                </button>
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="flex-grow-1 col-pad-0">
                    <div class="d-inline">
                        <input v-model="userInput" type="text" class="border-0" placeholder="Type to add different skill" @keyup="skillEvent" @keydown.down.prevent="onArrowDown" @keydown.up.prevent="onArrowUp" @keydown.enter="selectFromOption" @keydown.esc="cancelSuggestion">

                        <div v-if="receivedSuggestions.length > 0" class="suggestionDropDown position-absolute bg-white text-left mt-1 shadow" style="padding-right:15px;">
                            <ul class="list-unstyled">
                                <li v-for="(suggestion, i) in receivedSuggestions" :key="i" :class="{ 'is-Active': i === arrowCounter }" class="dropdownResult mb-2">
                                    {{suggestion}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <suggestSkill v-if="skillNotFound" v-bind:skill-not-found="userInput" @suggestionSubmited="suggestionSubmitedSuccesfully"></suggestSkill>
    </div>
</template>

<script>
    import suggestSkill from './SuggestSkillComponent.vue'
    export default {
        components: {
            suggestSkill
        },

        props: ['currentSkill'],

        data() {
            return {
                userInput: '',
                userProvidedSkills: [],
                userProvidedSkillsString: '',
                receivedSuggestions: [],
                arrowCounter: 0,
                skillNotFound: false,
            }
        },

        methods: {
            cancelSuggestion() {
                console.log('Suggestion Canceled');
                this.userInput = '';
            },

            suggestionSubmitedSuccesfully() {
                this.userInput = '';
                this.skillNotFound = false;
                alert('Contgratulation you suggestion has been submited successfully !');
            },

            removeThisSkill(i) {
                this.userProvidedSkills.splice(i, 1);
                this.updateSkillsInParent(this.userProvidedSkills);
            },

            cancelSuggestion(e) {
                this.receivedSuggestions.splice(0);
            },

            selectFromOption(ev) {
                ev.preventDefault();
                if (this.receivedSuggestions[this.arrowCounter]) {
                    this.userProvidedSkills.push(this.receivedSuggestions[this.arrowCounter]);
                    this.receivedSuggestions.splice(0);
                    this.userInput = '';
                    this.arrowCounter = 0;
                    this.updateSkillsInParent(this.userProvidedSkills);
                } else {
                    console.log('Not adding cause its empty');
                }
            },

            updateSkillsInParent(skills) {
                this.userProvidedSkillsString = skills.join(', ');
                this.$emit('userSelectedASkill', this.userProvidedSkillsString);
            },

            onArrowDown() {
                if (this.arrowCounter < this.receivedSuggestions.length-1) {
                    this.arrowCounter = this.arrowCounter + 1;
                } else {
                    this.arrowCounter = 0;
                }
            },

            onArrowUp() {
                if (this.arrowCounter > 0) {
                    this.arrowCounter = this.arrowCounter - 1;
                }
            },

            skillEvent(ev) {
                if (ev.key !== 'ArrowDown' && ev.key !== 'ArrowUp' && ev.key !== 'Escape' && ev.key !== 'Enter') {
                    if (this.userInput.length > 0) {
                        this.fireDebounce();
                    } else{
                        this.receivedSuggestions.splice(0);
                        this.skillNotFound = false;
                    }
                }
            },

            fireDebounce: _.debounce(() => {
                console.log('debounce called');
                Event.$emit('getSkills');
                }, 500),

            getSkillSuggestion() {
                let results;
                axios.post('/api/elancer/skill-suggestion/' + this.currentSkill, {userInput: this.userInput})
                    .then(response => {
                        results = response.data;
                        if (!(results.length > 0)) {
                            this.skillNotAvailable();
                        }
                        this.updateReceivedSuggestions(results);
                    })
                    .catch(errors => {

                    });
            },

            skillNotAvailable() {
                this.skillNotFound = true;
            },

            updateReceivedSuggestions(results) {
                if (this.userProvidedSkills.length > 0) {
                    results.forEach((result) => {
                        if (!this.userProvidedSkills.includes(result)) {
                            this.receivedSuggestions.push(result);
                        }
                    });
                } else {
                    this.receivedSuggestions = results;
                }
            }
    },

    created() {
        Event.$on('suggestionCanceled', () => {
            this.skillNotFound = false;
            this.userInput = '';
        });

        Event.$on('getSkills', () => {
            this.getSkillSuggestion();
        });
    }
}
</script>

<style lang="scss" scoped>
    .custom-list-inline {
        margin: 0 0 10px 10px;
    }

    .col-pad-0 {
        padding: 0;
    }
    $padding-left: 19px;
    input {
        background: transparent;
        padding: 13px 19px;
        width: 99%
    }
    input:focus {
        outline-color: transparent;
        background: transparent;
    }
    input:active {
        background: transparent;
    }
    .customWraper {
        border: 1px solid #53A009;
        // padding: 10px 0;
    }
    .customWraper:hover {
        box-shadow: 0px 0px 3px inset green !important;
    }
    .skillBox {
        // margin-top: 10px;
    }
    .userSkillbox {
        cursor: default;
    }

    .userSkillbox:hover {
        background: #53A009 !important;
    }

    .userSkillboxBtn {
        background: transparent;
    }

    .suggestionDropDown {
        z-index:1080;
        /*box-shadow: */
    }

    .dropdownResult {
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: $padding-left;
    }

    .is-Active {
        border-left: 4px solid green;
        padding-left: calc(#{$padding-left} - 4px);
        color: #53A009;
    }

</style>


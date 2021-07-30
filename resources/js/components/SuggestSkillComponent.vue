<template>
    <div>
        <p class="card-subtitle mb-1 mt-2 text-danger">
            <i class="fas fa-exclamation-circle"></i>
            The skill "{{skillNotFound}}" your looking for is not found.
            <a class="text-primary font-weight-bold px-2" href="#" style="cursor: pointer;" @click.prevent="showModal">Suggest this skill ?</a>
        </p>


        <div class="modal fade" id="suggestSkillModal" tabindex="-1" role="dialog" aria-labelledby="suggestSkillModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Suggest Skill</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="skillReference">Provide link to a reference where we can review the skill</label>
                                <input v-model="suggestionForm.url" type="url" name="url" class="form-control rounded-0" id="skillReference">
                                <has-error :form="suggestionForm" field="url"></has-error>
                                <small class="form-text text-muted">e.g.: https://en.wikipedia.org/wiki/JavaScript</small>
                            </div>

                            <div class="form-group">
                                <label for="title">Title of skill</label>
                                <input v-model="suggestionForm.title" type="text" name="title" class="form-control rounded-0" id="title">
                                <has-error :form="suggestionForm" field="title"></has-error>
                            </div>
                        </form>
                    </div>

                    <div class="modal-body">
                        <p>Be informed that we will review your suggestion as soon as possible and update accordingly.</p>
                        <p>Thanks for taking you time to inform and suggest us.</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click.prevent="cancelSuggestion">Cancel</button>
                        <button type="button" class="btn btn-primary" @click.prevent="submitSuggestion">Submit suggestion</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { SweetModal, SweetModalTab } from 'sweet-modal-vue';

    export default {
        components: {
            SweetModal,
            SweetModalTab
        },

        props: ['skillNotFound'],

        data() {
            return {
                suggestionForm: new Form({
                    url: '',
                    title: this.skillNotFound
                }),
            }
        },

        methods: {
            cancelSuggestion() {
                $('#suggestSkillModal').modal('hide');
                Event.$emit('suggestionCanceled');
            },

            showModal() {
                $('#suggestSkillModal').modal('show')
            },

            submitSuggestion() {
                this.suggestionForm.post('/api/skill-suggestion')
                    .then(response => {
                        const status = response.data.status;

                        if (status === 200) {
                            $('#suggestSkillModal').modal('hide');
                            this.$emit('suggestionSubmited');
                        }
                    })
            }
        }
    }
</script>

<style>
    .invalid-feedback {
        display: block;
    }
</style>

<template>
    <div class="col-12 col-sm-4">
        <div tabindex="0" class="btn btn-block customRadio text-left text-sm-center mb-2 rounded-0 py-sm-3 p-3 p-sm-1" @keydown.space="currentSelection" @click="currentSelection" :class="[projectType === typeSelected ? cardClicked : cardNotClicked ]">
            <slot name="cardIcon"></slot>
            <span class="mx-1 mx-sm-0">{{projectType}}</span>
            <!-- {{projectType}} -->
        </div>
    </div>
</template>

<script>
export default {
    model: {
        prop: 'typeSelected',
        event: 'currentlySelected'
    },

    props: ['projectType', 'typeSelected'],
    data() {
        return {
            currentlySelected: false,
            cardClicked: 'card-clicked',
            cardNotClicked: 'card-not-clicked',
        }
    },

    methods: {
        currentSelection() {
            this.$emit('currentlySelected', this.projectType);
        }
    }
}
</script>

<style scoped>
    .customRadio {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        cursor: pointer;
    }
    .customRadio:hover {
        box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.275) !important;
    }
    .customRadio:focus {
        box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.275) !important;
    }

    .card-clicked {
        border-bottom: .20rem solid #15be61;
        color: #15be61;
    }
    .card-not-clicked {
        color: #6B757D;
    }
</style>

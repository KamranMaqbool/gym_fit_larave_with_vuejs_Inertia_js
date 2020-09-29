<template>
    <Layout>
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h4>
                        <inertia-link :href="$route('lead.list')">Leads</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        <inertia-link :href="$route('lead.view',{lead:lead})">Leads Details</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        Reminder Add Note &#x1f4d3;
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Add Note &#x2795;
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="handleAddNote">
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <textarea name="note" class="form-control" v-model="note"></textarea>
                                    <div class="error" v-if="$page.errors.note">{{ $page.errors.note[0] }}</div>
                                </div>
                            <button class="btn btn-success">Submit &#x1f680;</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
<script>
import Layout from '../../shared/Layout.vue'
import ReminderAddForm from './ReminderForm.vue'
export default {
    name: 'ReminderNote',
    components: {
        Layout,
        ReminderAddForm
    },
    props: {
        lead: Object,
        reminder: Object,
    },
    data() {
        return {
            note: '',
        }
    },
    methods: {
        handleAddNote() {
            const data = {
                reminder_id: this.reminder.id,
                note: this.note,
            }
            this.$inertia.post(route('reminder.close'), data);

        }
    }
}

</script>

<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>
                        <inertia-link :href="$route('lead.list')">Leads</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        Lead details
                    </h4>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Lead</strong>
                        </div>
                        <div class="card-body">
                            <add-form @leadAdded="handleLeadAdded" :main-lead="lead" :packages="packages"></add-form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Lead Reminders</strong>
                        </div>
                        <div class="card-body" v-if="lead.reminders.length > 0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" v-for="reminder in lead.reminders" :key="reminder.id">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{reminder.reminder}}
                                        </div>
                                        <div class="col-md-2">{{reminder.reminder_date}}</div>
                                        <div class="col-md-2"><strong>{{reminder.status}}</strong></div>
                                        <div class="col-md-2">
                                            <inertia-link :href="$route('reminder.view',{lead:lead,reminder:reminder})" class="dropdown-item float-right"> &#x27a1; </inertia-link>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body" v-else>
                            <inertia-link :href="$route('reminder.add',{'lead':lead})" class="btn btn-success">Add New Reminder &#x23f2;</inertia-link>
                            <!-- <button type="button" class="btn btn-success">Add New Reminder &#x23f2;</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
<script>
import Layout from '../../shared/Layout.vue'
import AddForm from './LeadForm.vue'
export default {
    props: ['leadProp', 'packages'],
    components: {
        Layout,
        AddForm
    },
    data() {
        return {
            lead: {
                name: '',
                interested_package: '',
                phone: '',
                email: '',
                dob: '',
                reminders: [],
            }
        }
    },
    methods: {
        async handleLeadAdded(payload) {
            payload['id'] = this.lead.id;
            let respone = await this.$inertia.post('/leads/update', payload);
            debugger
        }
    },
    created() {
        this.lead = this.leadProp;
    },
}

</script>

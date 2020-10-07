<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        <inertia-link :href="$route('lead.list')">Leads</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        New lead
                    </h1>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <lead-form :main-lead="lead" :packages="packages" @leadAdded="handleSubmit"></lead-form>
                </div>
            </div>
        </div>
    </Layout>
</template>
<script>
import Layout from '../../shared/Layout.vue'
import LeadForm from './LeadForm.vue'
export default {
    props: ['name', 'degree', 'mainLead', 'packages'],
    components: {
        Layout,
        LeadForm
    },
    data() {
        return {
            lead: {
                name: '',
                interested_package: '',
                phone: '',
                email: '',
                dob: '',
            }
        }
    },
    created() {

    },
    methods: {
        async handleSubmit(payload) {
            let data = await this.$inertia.post('/leads/save', payload);
        }
    }
}

</script>

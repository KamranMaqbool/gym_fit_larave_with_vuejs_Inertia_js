<template>
    <Layout>
        <div class="container">
            <form @submit.prevent="handleSubmit">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name &#x1f64e;</label>
                            <input type="text" class="form-control" placeholder="Enter name" v-model="lead.name" id="name" tabindex="1">
                        </div>
                        <div class="form-group">
                            <label for="name">Phone &#x1f4f1;</label>
                            <input type="text" class="form-control" placeholder="Enter phone" v-model="lead.phone" id="phone" tabindex="3">
                        </div>
                        <div class="form-group">
                            <label for="name">Interested Package &#x1f4e6;</label>
                            <input type="text" class="form-control" placeholder="Enter the package interested in" v-model="lead.interested_package" id="name" tabindex="5">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email &#x1f4e7;</label>
                            <input type="email" class="form-control" placeholder="Enter email" v-model="lead.email" id="email" tabindex="2">
                        </div>
                        <div class="form-group">
                            <label for="name">Birthday &#x1f4b5;</label>
                            <input type="date" class="form-control" placeholder="Enter dob" v-model="lead.dob" id="phone" tabindex="4">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success">Submit</button> 
                        <inertia-link class="btn btn-primary" :href="$route('lead.list')">Back &#x1f448; </inertia-link>
                    </div>
                </div>
            </form>
        </div>
    </Layout>
</template>
<script>
import Layout from '../../shared/Layout.vue'
export default {
    props: ['leadProp'],
    components: {
        Layout
    },
    data(){
        return {
            lead:{
                name:'',
                interested_package:'',
                phone:'',
                email:'',
                dob:'',
            }
        }
    },
    methods:{
        async handleSubmit(){
            let respone = await this.$inertia.post('/leads/update',this.lead);
            debugger
        }
    },
    created(){
        this.lead = this.leadProp;
    },
}

</script>

<template>
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
                    <select name="ip" id="ip" class="form-control" v-model="lead.interested_package" tabindex="5">
                        <option v-for="option in packages" v-bind:value="option.name" :key="option.id" v-bind:selected="option.name==mainLead.interested_package">
                            {{option.name}} ({{option.number_of_days}}) days for RS {{option.amount}}
                        </option>
                    </select>
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
</template>
<script>
export default {
    name: "LeadAddForm",
    props: {
        mainLead: Object,
        packages: Array,
    },
    data() {
        return {
            lead: {
                name: "",
                phone: "",
                interested_package: "",
                email: "",
                dob: "",
            }
        }
    },
    created() {
    	this.lead = this.mainLead;
    },
    methods: {
        async handleSubmit() {
            let data = {
                name: this.lead.name,
                interested_package: this.lead.interested_package,
                phone: this.lead.phone,
                email: this.lead.email,
                dob: this.lead.dob,
            }
            this.$emit('leadAdded', data);
        }
    }
}

</script>

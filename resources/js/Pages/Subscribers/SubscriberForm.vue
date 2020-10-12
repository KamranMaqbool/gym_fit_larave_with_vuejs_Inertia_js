<template>
    <form @submit.prevent="handleSubmit">
        <div class="form-group">
            <label for="name">Name: &#x1f64e;</label>
            <input type="text" class="form-control" placeholder="Enter name" v-model="localLead.name" id="name" tabindex="1">
            <div class="error" v-if="$page.errors.name">{{ $page.errors.name[0] }}</div>
        </div>
        <div class="form-group">
            <label for="name">Interested Package &#x1f4e6;</label>
            <select name="ip" id="ip" class="form-control" v-model="localLead.interested_package" tabindex="2">
                <option v-for="option in packages" v-bind:value="option.name" :key="option.id" v-bind:selected="option.name==lead.interested_package">
                    {{option.name}} ({{option.number_of_days}}) days for RS {{option.amount}}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Subscription edns at: &#x23f2;</label>
            <input type="date" class="form-control" placeholder="Enter name" v-model="subscriptionEndDate" id="subscription_date" tabindex="3" disabled>
        </div>
        <div class="form-group">
            <label for="name">Subscription Price: &#x1f4b8;</label>
            <input type="text" disabled class="form-control" v-model="userPaymentAmount" id="userPaymentAmount" tabindex="4">
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
</template>
<script>
import moment from 'moment'
export default {
    name: "SubscriberForm",
    props: {
        lead: Object,
        packages: Array,
    },
    data() {
        return {
            localLead: {
                name: "",
                interested_package: "",
            }
        }
    },
    created() {
        this.localLead = this.lead;
    },
    methods: {
        handleSubmit() {
            const filter_package = this.packageFilter();

            let data = {
                name: this.localLead.name,
                package_id: filter_package.id,
                lead_id: this.lead.id,
                renewal_date: moment().add(filter_package.number_of_days, 'days').format("YYYY-MM-DD"),
                amount: filter_package.amount,
            }
            this.$emit('SubscriberAdded', data);
        },
        packageFilter() {
            const filter_package = this.packages.filter(item => {
                return item.name === this.localLead.interested_package
            })[0];
            return filter_package;
        }
    },
    computed: {
        subscriptionEndDate() {
            const filter_package = this.packageFilter();
            return moment().add(filter_package.number_of_days, 'days').format('YYY-MM-DD');
        },
        userPaymentAmount() {
            const filter_package = this.packageFilter();
            return "Rs " + filter_package.amount;
        }
    }
}

</script>

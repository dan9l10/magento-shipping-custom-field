var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/set-shipping-information': {
                'Danylo_ShippingModule/js/action/set-shipping-information-mixin' : true
            }
        }
    },
    "map": {
        "*": {
            "Magento_Checkout/js/model/shipping-save-processor/default" : "Danylo_ShippingModule/js/shipping-save-processor"
        }
    }
};

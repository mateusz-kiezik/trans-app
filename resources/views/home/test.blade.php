<script>
    function addressAutocomplete(containerElement) {
    ...



        /* Execute a function when someone writes in the text field: */
        inputElement.addEventListener("input", function (e) {

            /* Close any already open dropdown list */
            closeDropDownList();

        ...

            /* Create a new promise and send geocoding request */
            var promise = new Promise((resolve, reject) => {...
            });

            promise.then((data) => {
                currentItems = data.features;

                /*create a DIV element that will contain the items (values):*/
                var autocompleteItemsElement = document.createElement("div");
                autocompleteItemsElement.setAttribute("class", "autocomplete-items");
                containerElement.appendChild(autocompleteItemsElement);

                /* For each item in the results */
                data.features.forEach((feature, index) => {
                    /* Create a DIV element for each element: */
                    var itemElement = document.createElement("DIV");
                    /* Set formatted address as item value */
                    itemElement.innerHTML = feature.properties.formatted;
                    autocompleteItemsElement.appendChild(itemElement);
                });
            }, (err) => {...
            }
        });
    }

    )
    ;

    function closeDropDownList() {
        var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
        if (autocompleteItemsElement) {
            containerElement.removeChild(autocompleteItemsElement);
        }
    }
    }
</script>

<script>
    document.addEventListener('livewire:init', function() {
        if(document.querySelector('#ciudad_id')) {
            new TomSelect('#ciudad_id', {
                maxItems: 1,
                valueField: 'id',
                labelField: 'nombre',
                searchField: ['nombre'],
                load: function(query, callback) {
                    var url = "{{ route('data.ciudad') }}" + '?q=' + encodeURIComponent(query)
                    fetch(url)
                        .then(response => response.json())
                        .then(json => {
                            callback(json);
                        }).catch(() => {
                            callback();
                        });
                },
                onChange: function(value) {
                    var customer = this.options[value]
                    console.log('ciudad' + value)
                    if (customer !== null && typeof customer !== 'undefined') {
                        livewire.dispatch('ciudad', {ciudad: ciudad})
                    }
                },
                render: {
                    option: function(item, escape) {
                        return `<div class="py-1 d-flex">
                            <div>
                                <div class="mb-0">
                                    <span class= "h-5 text-info">
                                        <b class="text-dark">${ escape(item.id) }
                                    </span>
                                    <span class="text-warning">|${ escape(item.nombre.toUpperCase()) } </span> 
                                </div>
                            </div>
                        </div>`;
                    }
                }
            })
        }
    })
</script>
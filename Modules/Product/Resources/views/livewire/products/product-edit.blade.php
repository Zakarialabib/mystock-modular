<div class="modal-dialog">

    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{__('Update Product')}} : {{ $product->product_name }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="product-form" action="{{ route('products.update', $product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="lg:w-1/2 sm:w-1/2 px-2">
                                        <div class="form-group">
                                            <label for="product_name" autofocus>{{ __('Product Name') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="product_name" required
                                                value="{{ $product->product_name }}">
                                        </div>
                                    </div>
                                    <div class="lg:w-1/2 sm:w-1/2 px-2">
                                        <div class="form-group">
                                            <label for="product_code">{{ __('Code') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="product_code" required
                                                value="{{ $product->product_code }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="category_id">{{ __('Category') }} <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" name="category_id" id="category_id" required>
                                                @foreach (\Modules\Product\Entities\Category::all() as $category)
                                                    <option
                                                        {{ $category->id == $product->category->id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="lg:w-1/2 sm:w-1/2 px-2">
                                            <div class="form-group">
                                                <label for="product_cost">{{ __('Cost') }} <span
                                                        class="text-danger">*</span></label>
                                                <input id="product_cost" type="text" class="form-control"
                                                    min="0" name="product_cost" required
                                                    value="{{ $product->product_cost }}">
                                            </div>
                                        </div>
                                        <div class="lg:w-1/2 sm:w-1/2 px-2">
                                            <div class="form-group">
                                                <label for="product_price">{{ __('Price') }} <span
                                                        class="text-danger">*</span></label>
                                                <input id="product_price" type="text" class="form-control"
                                                    min="0" name="product_price" required
                                                    value="{{ $product->product_price }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="lg:w-1/2 sm:w-1/2 px-2">
                                            <div class="form-group">
                                                <label for="product_quantity">{{ __('Quantity') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="product_quantity"
                                                    required value="{{ $product->product_quantity }}" min="1">
                                            </div>
                                        </div>
                                        <div class="lg:w-1/2 sm:w-1/2 px-2">
                                            <div class="form-group">
                                                <label for="product_stock_alert">{{ __('Alert Quantity') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="product_stock_alert"
                                                    required value="{{ $product->product_stock_alert }}"
                                                    min="0">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                                        {{ __('More details') }}
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingOne"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <div class="form-row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="product_order_tax">{{__('Tax')}} (%)</label>
                                                                <input type="number" class="form-control"
                                                                    name="product_order_tax"
                                                                    value="{{ $product->product_order_tax }}"
                                                                    min="0" max="100">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="product_tax_type">{{__('Tax type')}}</label>
                                                                <select class="form-control" name="product_tax_type"
                                                                    id="product_tax_type">
                                                                    <option value="" selected>{{__('None')}}</option>
                                                                    <option
                                                                        {{ $product->product_tax_type == 1 ? 'selected' : '' }}
                                                                        value="1">{{__('Exclusive')}}</option>
                                                                    <option
                                                                        {{ $product->product_tax_type == 2 ? 'selected' : '' }}
                                                                        value="2">{{__('Inclusive')}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="product_unit">{{__('Unit')}} <i
                                                                        class="bi bi-question-circle-fill text-info"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="This text will be placed after Product Quantity."></i>
                                                                    <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    name="product_unit"
                                                                    value="{{ old('product_unit') ?? $product->product_unit }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="barcode_symbology">{{__('Barcode Symbology')}} <span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-control" name="product_barcode_symbology"
                                                            id="barcode_symbology" required>
                                                            <option selected
                                                                {{ $product->product_barcode_symbology == 'C128' ? 'selected' : '' }}
                                                                value="C128">Code 128</option>
                                                            <option
                                                                {{ $product->product_barcode_symbology == 'C39' ? 'selected' : '' }}
                                                                value="C39">Code 39</option>
                                                            <option
                                                                {{ $product->product_barcode_symbology == 'UPCA' ? 'selected' : '' }}
                                                                value="UPCA">UPC-A</option>
                                                            <option
                                                                {{ $product->product_barcode_symbology == 'UPCE' ? 'selected' : '' }}
                                                                value="UPCE">UPC-E</option>
                                                            <option
                                                                {{ $product->product_barcode_symbology == 'EAN13' ? 'selected' : '' }}
                                                                value="EAN13">EAN-13</option>
                                                            <option
                                                                {{ $product->product_barcode_symbology == 'EAN8' ? 'selected' : '' }}
                                                                value="EAN8">EAN-8</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="product_note">{{__('Note')}}</label>
                                                        <textarea name="product_note" id="product_note" rows="4 " class="form-control">{{ $product->product_note }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image">{{__('Product Images')}} <i
                                            class="bi bi-question-circle-fill text-info" data-toggle="tooltip"
                                            data-placement="top"
                                            title="Max Files: 3, Max File Size: 1MB, Image Size: 400x400"></i></label>
                                    <div class="dropzone d-flex flex-wrap align-items-center justify-content-center"
                                        id="document-dropzone">
                                        <div class="dz-message" data-dz-message>
                                            <i class="bi bi-cloud-arrow-up"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <button class="block uppercase mx-auto shadow bg-indigo-800 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">{{__('Update')}}<i class="bi bi-check"></i></button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('third_party_scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
@endsection

@push('page_scripts')
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('dropzone.upload') }}',
            maxFilesize: 1,
            acceptedFiles: '.jpg, .jpeg, .png',
            maxFiles: 3,
            addRemoveLinks: true,
            dictRemoveFile: "<i class='bi bi-x-circle text-danger'></i> remove",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">');
                uploadedDocumentMap[file.name] = response.name;
            },
            removedfile: function(file) {
                file.previewElement.remove();
                var name = '';
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name;
                } else {
                    name = uploadedDocumentMap[file.name];
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove();
            },
            init: function() {
                @if (isset($product) && $product->getMedia('images'))
                    var files = {!! json_encode($product->getMedia('images')) !!};
                    for (var i in files) {
                        var file = files[i];
                        this.options.addedfile.call(this, file);
                        this.options.thumbnail.call(this, file, file.original_url);
                        file.previewElement.classList.add('dz-complete');
                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">');
                    }
                @endif
            }
        }
    </script>

    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#product_cost').maskMoney({
                prefix: '{{ settings()->currency->symbol }}',
                thousands: '{{ settings()->currency->thousand_separator }}',
                decimal: '{{ settings()->currency->decimal_separator }}',
            });
            $('#product_price').maskMoney({
                prefix: '{{ settings()->currency->symbol }}',
                thousands: '{{ settings()->currency->thousand_separator }}',
                decimal: '{{ settings()->currency->decimal_separator }}',
            });

            $('#product_cost').maskMoney('mask');
            $('#product_price').maskMoney('mask');

            $('#product-form').submit(function() {
                var product_cost = $('#product_cost').maskMoney('unmasked')[0];
                var product_price = $('#product_price').maskMoney('unmasked')[0];
                $('#product_cost').val(product_cost);
                $('#product_price').val(product_price);
            });
        });
    </script>
@endpush

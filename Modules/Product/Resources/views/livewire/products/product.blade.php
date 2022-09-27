  {{-- <a href="{{ route('products.create') }}" class="btn btn-primary">
                            create
                        </a> --}}
  {{-- <button type="button" wire:click="$emit('showModal', 'product::products.product-create')" class="btn btn-primary">
      Add Product <i class="bi bi-plus"></i>
  </button>
  <hr> --}}
  <div>
      <div class="flex flex-wrap justify-center">
          <div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-wrap my-md-0 my-2">
              <select wire:model="perPage"
                  class="w-20 block p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm focus:shadow-outline-blue focus:border-blue-300 mr-3">
                  @foreach ($paginationOptions as $value)
                      <option value="{{ $value }}">{{ $value }}</option>
                  @endforeach
              </select>
          </div>
          <div class="lg:w-1/2 md:w-1/2 sm:w-full my-2 my-md-0">
              <div class="">
                  <input type="text" wire:model.debounce.300ms="search"
                      class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                      placeholder="{{ __('Search') }}" />
              </div>
          </div>
      </div>
      <div wire:loading.delay>
          Loading...
      </div>

      <x-table>
          <x-slot name="thead">
              <x-table.th>#</x-table.th>
              <x-table.th>
                  {{ __('Code') }}
              </x-table.th>
              <x-table.th>
                  {{ __('Image') }}
              </x-table.th>
              <x-table.th>
                  {{ __('Name') }}
              </x-table.th>
              <x-table.th>
                  {{ __('Quantity') }}
              </x-table.th>
              <x-table.th>
                  {{ __('Price') }}
              </x-table.th>
              <x-table.th>
                  {{ __('Cost') }}
              </x-table.th>
              <x-table.th>
                  {{ __('Category') }}
              </x-table.th>
              <x-table.th>
                  Actions
              </x-table.th>
              </tr>
          </x-slot>
          <x-table.tbody>
              @forelse($products as $product)
                  <x-table.tr>
                      <x-table.td>
                          <input type="checkbox" value="{{ $product->id }}" wire:model="selected">
                      </x-table.td>
                      <x-table.td>
                          {{ $product->product_code }}
                      </x-table.td>
                      <x-table.td>
                          @forelse($product->getMedia('images') as $media)
                              <img src="{{ $media->getUrl() }}" alt="Product Image"
                                  class="img-fluid img-thumbnail mb-2">
                          @empty
                              <img src="{{ $product->getFirstMediaUrl('images') }}" alt="Product Image"
                                  class="img-fluid img-thumbnail mb-2">
                          @endforelse
                      </x-table.td>
                      <x-table.td>
                          {{ $product->product_name }}
                      </x-table.td>
                      <x-table.td>
                          {{ $product->product_quantity }}
                      </x-table.td>
                      <x-table.td>
                          {{ $product->product_cost }}
                      </x-table.td>
                      <x-table.td>
                          {{ $product->product_price }}
                      </x-table.td>
                      <x-table.td>
                          {{ $product->category->category_name }}
                      </x-table.td>
                      <x-table.td>
                          {{-- <a class="btn btn-info btn-sm"
                                href="{{ route('products.edit', $product->id) }}">
                                <i class="bi bi-pencil"></i>
                            </a> --}}
                          <button type="button" class="btn btn-sm btn-primary"
                              wire:click="$emit('showModal', 'product::products.product-show', {{ $product->id }})">
                              <i class="bi bi-eye"></i>
                          </button>
                          <button type="button" class="btn btn-sm btn-primary"
                              wire:click="$emit('showModal', 'product::products.product-edit', {{ $product->id }})">
                              <i class="bi bi-pencil"></i>
                          </button>
                      </x-table.td>
                  </x-table.tr>
              @empty
                  <x-table.tr>
                      <x-table.td colspan="10" class="text-center">
                          {{ __('No entries found.') }}
                      </x-table.td>
                  </x-table.tr>
              @endforelse
          </x-table.tbody>
      </x-table>

      <div class="p-4">
          <div class="pt-3">
              @if ($this->selectedCount)
                  <p class="text-sm leading-5">
                      <span class="font-medium">
                          {{ $this->selectedCount }}
                      </span>
                      {{ __('Entries selected') }}
                  </p>
              @endif
              {{ $products->links() }}
          </div>
      </div>
  </div>

  <script>
      Livewire.on('confirm', e => {
          if (!confirm("{{ __('Are you sure') }}")) {
              return
          }
          @this[e.callback](...e.argv)
      });
  </script>

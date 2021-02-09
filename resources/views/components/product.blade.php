<div class="p-6">
<div class="flex flex-row justify-between uppercase font-bold text-blue-dark border-b p-6">
    <p>{{ $item->name }}</p>
    <div class="cursor-pointer text-grey-dark hover:text-blue duration-4"><i class="fas fa-ellipsis-v"></i></div>
</div>
<div class="p-6 text-grey-darker text-justify flex flex-col">
    <p class="font-bold text-sm uppercase mb-2 text-blue-darker">Item description:<p>
        <span class="text-grey-darker">
          {{ $item->description }}
        </span>
    <div class="pt-4">
        <span class="uppercase bg-green text-white font-bold p-2 text-xs shadow rounded">{{ $item->price }}</span>
        <span class="uppercase bg-yellow-dark text-grey-darkest font-bold p-2 text-xs shadow rounded">stock: {{ $item->stock }}</span>
    </div>
</div>
<div class="p-6 text-grey-darker text-justify flex flex-row justify-end border-t">
    <button class="uppercase self-end text-blue mx-8 text-sm hover:text-blue-dark duration-4 self-center">details</button>
    <button class="uppercase self-end bg-green font-bold text-white px-6 py-4 rounded hover:bg-green-dark duration-4"><i class="fa fa-cart-plus mr-4"></i>Add to cart</button>
    <add-to-cart :product="{{ $item }}"></add-to-cart>
</div>
</div>

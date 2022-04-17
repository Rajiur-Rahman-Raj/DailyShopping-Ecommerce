<ul style="padding:10px 10px;">
  @forelse ($products as $key=> $product)
    <a href="{{ url('product/details') }}/{{ $product->id }}">
      <li style="display:block;">
        <img src="{{ asset('uploads/product_img') }}/{{ $product->product_image }}" alt="not found" width="150" height="120" style="margin-bottom:10px;">
        <strong style="color:black; margin-left:10px">{{ $product->product_name }}</strong>
      </li>
    </a>
  @empty
    <p style="color:black; font-weight:bold"> [ We're sorry. We cannot find any matches for your search item. ] </p>
  @endforelse

</ul>

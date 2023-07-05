<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function index()
    {
        $data = Product::orderBy('id', 'DESC')->get();

        return view('product.index', ['data' => $data]);
    }

    public function add()
    {
        $type = Type::get();

        return view('product.add', ['type' => $type]);
    }

    public function detail($id)
    {
        $product = Product::join('types', 'products.type_id', '=', 'types.id')
            ->select('products.*', 'types.name as tipe_name', 'products.image')
            ->where('products.id', $id)
            ->first();
        dd($product);


        return view('product.detail', ['product' => $product]);
    }
    public function edit($id)
    {
        $product = Product::find($id);

        $type = Type::get();

        return view('product.edit', ['product' => $product, 'type' => $type]);
    }

    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'name' => 'required',
            'productType' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images'), $imageName);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->type_id = $request->productType;
        $product->image = $imageName;
        $product->save();

        // $product->name = $request->name;     ( $product->name = field dari table   $request->name = diambil dari frontend  )


        return redirect('/product');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'productType' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->type_id = $request->productType;
        $product->description = $request->description;

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Hapus foto sebelumnya jika ada
            if ($product->photo) {
                Storage::delete('public/images/' . $product->photo);
            }

            // Simpan foto baru
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Produk tidak ditemukan.');
        }

        // Hapus foto produk jika ada
        if ($product->image) {
            // Hapus foto dari direktori penyimpanan
            Storage::delete('images/' . $product->image);
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}

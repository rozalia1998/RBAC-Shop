<?php
namespace App\Http\Livewire\FrontEnd\Product;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class Index extends Component
{
    public $categories;
    public $selectedCategory;
    public $minPrice=0;
    public $maxPrice=1000;
    public $products;

    public function mount()
    {
        $this->categories = Category::with('subcategories')->get();
        $this->products = Product::all();
    }

    public function updatedSelectedCategory($categoryId)
    {
        if ($categoryId) {
            $category = Category::with('subcategories.products')->find($categoryId);

            if ($category) {
                $this->products = $this->getProductsFromCategory($category);
            }
        } else {
            $this->products = Product::all();
        }
    }

    protected function getProductsFromCategory($category)
    {
        $products = collect();

        if ($category->subcategories->isNotEmpty()) {
            foreach ($category->subcategories as $subcategory) {
                $products = $products->merge($this->getProductsFromCategory($subcategory));
            }
        } else {
            $products = $category->products;
        }

        return $products;
    }

    public function applyPriceFilter()
    {
        if ($this->selectedCategory) {
            $category = Category::with('subcategories.products')->find($this->selectedCategory);
            $this->products = $this->getProductsFromCategory($category)
                ->where('price', '>=', $this->minPrice)
                ->where('price', '<=', $this->maxPrice);
        } else {
            $this->products = Product::where('price', '>=', $this->minPrice)
                ->where('price', '<=', $this->maxPrice)
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.front-end.product.index');
    }
}

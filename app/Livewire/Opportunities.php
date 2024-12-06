<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Item;
use Illuminate\Support\Facades\Cache;

class Opportunities extends Component
{
    use WithPagination;

    public $perPage = 20; // Default number of items per page
    public $options = [10, 20, 50, 100, 250]; // Available options for items per page
    public $search = ''; // Search term
    public $sortField = 'name'; // Default sort field
    public $sortDirection = 'asc'; // Default sort direction

    // URL persistence
    protected $queryString = ['perPage', 'search', 'sortField', 'sortDirection'];

    /**
     * Toggle the sort direction
     */
    public function sortBy($field)
    {
        $this->sortDirection = $this->sortField === $field && $this->sortDirection === 'asc' ? 'desc' : 'asc';
        $this->sortField = $field;
    }

    /**
     * Update pagination
     */
    public function updatePagination()
    {
        $this->resetPage();
    }

    /**
     * Main render method
     */
    public function render()
{
    $cacheKey = "items_{$this->search}_{$this->sortField}_{$this->sortDirection}_{$this->perPage}_page_" . $this->getPage();

    $items = Cache::remember($cacheKey, now()->addMinutes(2), function () {
        return Item::query()
            ->when($this->search, callback: function ($query) {
                $query->whereRaw('LOWER(name) like ?', ['%' . strtolower($this->search) . '%']);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);
    });

    return view('livewire.opportunities', [
        'items' => $items,
    ]);
}

}
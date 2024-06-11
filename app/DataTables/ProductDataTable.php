<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method. 
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function ($product) {
            $productId = $product->id;
            $productName = $product->product_name;
            $productCode = $product->product_code; 
            $productBuyingPrice = $product->buying_price; 
            $productSellingPrice = $product->selling_price; 
            $productStock = $product->stock;
            $showProductCreatedAt = $product->created_at;

            return 
            '
                
                <button type="button" class="btn btn-info col" data-bs-toggle="modal" data-bs-target="#showModal-' . $productId . '">Show</button>
                

                <div class="modal fade" id="showModal-' . $productId . '" tabindex="-1" aria-labelledby="showModalLabel-' . $productId . '" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showModalLabel-' . $productId . '">Show product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="mb-2">Product Name: ' . $productName . '</h5>
                                                <h5 class="mb-2">Product Stock: ' . $productStock . '</h5>
                                            </div>
                                            <div class="col-auto d-none d-sm-block">
                                                <h6 class="text-uppercase text-600">Product<span class="fas fa-product ms-2"></span></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="d-flex">
                                            <span class="fas fa-product text-success me-2" data-fa-transform="down-5"></span>
                                            <div class="flex-1">
                                                <p class="mb-0">Product was created : ' . $showProductCreatedAt . '</p>
                                                <p class="mb-0">Selling price : ' . $productSellingPrice . '</p>
                                                <p class="mb-0">Buying price : ' . $productBuyingPrice . '</p>


                                                <a href="products/' . $productId . '/edit" class="btn btn-primary">Edit</a>

                                                <form action="{{ route(\'products.destroy\', $product ) }}" method="POST">
                                                   @csrf
                                                   @method("delete")
                                                   <button type="button" class="btn btn-danger col" >Delete</button> 
                                                </form>            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                ' ;
        })  ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(50)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('product_name'),
            Column::make('stock'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}

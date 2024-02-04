<?php

namespace App\Tables;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Excel;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Users extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('name', 'LIKE', "%{$value}%")
                        ->orWhere('email', 'LIKE', "%{$value}%")
                        ->orWhere('pengguna', 'LIKE', "%{$value}%");
                });
            });
        });
        return QueryBuilder::for(User::class)
            ->defaultSort('name')
            ->allowedFilters(['name', 'email', 'pengguna', $globalSearch])
            ->allowedSorts(['name', 'id', 'pengguna', 'created_at']);
    }


    public function configure(SpladeTable $table)
    {
        $table
            ->export()
            ->withGlobalSearch(columns: ['id', 'name', 'email', 'pengguna', 'created_at'])
            ->column('id', sortable: true)
            ->defaultSort('name')
            ->column('name', sortable: true, searchable: true)
            ->column('email', searchable: true)
            ->column('created_at', sortable: true, searchable: true, canBeHidden: false)
            ->selectFilter('pengguna', [
                'su' => 'Super User',
                'admin' => 'Admin',
                'user' => 'User',
            ])

            ->column('action', exportAs: false)
            ->paginate();
    }
}

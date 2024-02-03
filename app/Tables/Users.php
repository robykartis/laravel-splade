<?php

namespace App\Tables;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
            ->allowedSorts(['name', 'email', 'pengguna']);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id', 'name', 'email', 'pengguna', 'created_at'])
            ->column('id', sortable: true)
            ->defaultSort('name')
            ->withGlobalSearch(columns: ['name', 'email', 'pengguna'])
            ->column('name', sortable: true, searchable: true)
            ->column('email', sortable: true, searchable: true)
            ->column('created_at', sortable: true, searchable: true, canBeHidden: false)
            // ->rowLink(function (User $user) {
            //     return route('users.show', $user);
            // })
            ->selectFilter('pengguna', [
                'su' => 'Super User',
                'admin' => 'Admin',
                'user' => 'User',
            ])
            ->column('action')
            ->paginate();
    }
}

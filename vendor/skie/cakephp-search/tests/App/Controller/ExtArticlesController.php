<?php
/**
 * PlumSearch plugin for CakePHP Rapid Development Framework
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author        Evgeny Tomenko
 * @since         PlumSearch 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace PlumSearch\Test\App\Controller;

use Cake\ORM\TableRegistry;
use PlumSearch\Controller\AutocompleteTrait;
use PlumSearch\Controller\Component\FilterComponent;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 * @property FilterComponent $Filter
 */
class ExtArticlesController extends AppController
{
    use AutocompleteTrait;

    public $helpers = [
        'PlumSearch.Search',
    ];

    /**
     * initialize callback
     *
     * @return void
     */
    public function initialize()
    {
        $Articles = TableRegistry::get('Articles');
        $author = $Articles->Authors;
        $this->loadComponent('Paginator');
        $this->loadComponent('PlumSearch.Filter', [
            'formName' => 'Article',
            'parameters' => [
                ['name' => 'title', 'className' => 'Input'],
                [
                    'name' => 'author_id',
                    'className' => 'Autocomplete',
                    'autocompleteAction' => function ($query) use ($author) {
                        return $author
                            ->find('all')
                            ->where(['name like' => '%' . $query . '%'])
                            ->formatResults(function ($authors) {
                                return $authors->map(function ($author) {
                                    return [
                                        'id' => $author['id'],
                                        'value' => $author['name']
                                    ];
                                });
                            });
                    }
                ],
            ]
        ]);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $Articles = TableRegistry::get('Articles');
        $this->set('articles', $this->Paginator->paginate($this->Filter->prg($Articles)));
    }
}

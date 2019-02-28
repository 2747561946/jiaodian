<?php

namespace App\Admin\Controllers;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use DB;
use App\Models\Lab;
use App\Models\Cat;

class BlogsController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        // $filter->column(1/2, function($filter){
        //     $filter->like('title');
        // });

        return $content
            ->header('博文')
            ->description('列表')
            ->body($this->grid());
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {   
        
        $grid = new Grid(new Blog);

        $grid->id('Id')->sortable();
        $grid->title('标题');
        // $grid->content('内容');
        $grid->logo('图片')->display(function ($value) {
            return "<img width='50' src='/upload/$value'>";
        });
        $grid->discuss('评论');
        $grid->display('浏览');
    
        $grid->lab_id('标签')->display(function ($value) {
            $lab_name = Lab::select('lab_name')->where('id',$value)->get();
            
            return $lab_name[0]->lab_name;
        });

        $grid->cat_id('分类')->display(function ($value) {
            $cat_name = Cat::select('cat_name')->where('id',$value)->get();
            return $cat_name[0]->cat_name;
        });
       


        $grid->created_at('添加时间');
        
        $grid->actions(function ($actions){
            $actions->disableView();
        });

        $grid->filter(function($filter){
            $filter->like('title', '标题');
            $filter->like('content', '内容');
        });

       return $grid;
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {   
       
        $form = new Form(new Blog);
        $lab = Lab::all();
        $labs = [];
        foreach($lab as $v) {
            $labs[$v['id']] = $v->lab_name;
        }
        $cat = Cat::all();
        // dd($cat);  
        $cats = [];
        foreach($cat as $v)
        {
            $cats[$v['id']] = $v->cat_name;
        }
        $date = date('Ymd');
        $x = 194;
        $y = 121;
        $form->text('title', '标题')->rules('required');
        $form->select('lab_id', '标签')->options($labs);   
        $form->select('cat_id', '分类')->options($cats);     
        $form->simplemde('content', '内容')->rules('required');
        // $form->image('logo', '图片')->rules('required|image')->move('/upload/',$date)->crop($x, $y)->removable();
        $form->image('logo', '图片')->move('/image')->resize(300, 200);
       


        return $form;
    }
}

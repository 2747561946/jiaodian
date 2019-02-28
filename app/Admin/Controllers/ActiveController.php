<?php

namespace App\Admin\Controllers;

use App\Models\Active;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ActiveController extends Controller
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
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
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
        $grid = new Grid(new Active);

        $grid->id('Id');
        // $grid->updated_at('Updated at');
        $grid->title('活动主题');
        $grid->host('主办单位');
        $grid->time('活动时间');
        $grid->place('活动地点');
        $grid->price('活动费用');
        $grid->few('活动期数');
        // $grid->created_at('创建时间');
        $grid->logo('封面图')->display(function($value){
            return "<img width='50' src='/upload/$value'>";

        });
        

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Active::findOrFail($id));

        $show->id('Id');
        $show->created_at('Created at');
        $show->updated_at('Updated at');
        $show->title('Title');
        $show->host('Host');
        $show->time('Time');
        $show->place('Place');
        $show->price('Price');
        $show->few('Few');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Active);

        $form->text('title', '活动主题');
        $form->simplemde('content', '活动介绍');
        $form->text('host', '主办单位');
        $form->text('time', '活动时间');
        $form->text('place', '活动地点');
        $form->number('price', '活动价格');
        $form->number('few', '活动期数');
        $form->image('logo', '封面图')->move('/image')->resize(318,201);
        // $form->image('logo', '图片')->move('/image')->resize(300, 200);
        

        return $form;
    }
}

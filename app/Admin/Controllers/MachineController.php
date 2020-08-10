<?php

namespace App\Admin\Controllers;

use App\Models\Machine;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MachineController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '机械';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Machine());

        $grid->model()->orderBy('id','desc');

        $grid->column('id', __('编号'));
        $grid->column('num', __('机械编码'));
        $grid->column('qrcode',__('二维码'))->qrcode();
        $grid->column('forbidden_area', __('禁用区内'))->using(Machine::getForbiddenStatus());
        $grid->column('standard', __('国标'))->using(Machine::getStandardStatus());
        $grid->column('name', __('机械'));
        $grid->column('product_no', __('机械编号'));
        $grid->column('brand', __('机械品牌'));
        $grid->column('model', __('机械型号'));
        $grid->column('manufacture', __('制造商'));
        $grid->column('info_status', __('信息状态'))->using(Machine::getApprovedStatus());
        $grid->column('first_apply_at', __('首次申报时间'));
        $grid->column('test_results', __('检测结果'));
        $grid->column('test_at', __('检测时间'));
//        $grid->column('pics', __('Pics'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->column(1/2,function ($filter) {
                $filter->like('num','编码');
                $filter->like('name','机械名');
                $filter->like('product_no','机械编号');
                $filter->like('brand','机械品牌');
            });

            $filter->column(1/2,function ($filter) {
                $filter->like('manufacture','制造商');
                $filter->in('info_status','信息状态')->multipleSelect(Machine::getApprovedStatus());
                $filter->between('created_at','创建时间')->datetime();
            });
        });

        $grid->actions(function($actions) {
            $actions->disableView();
            $actions->disableDelete();
        });

        $grid->fixColumns(4,-2);
        $grid->disableExport();

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
        $show = new Show(Machine::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('num', __('Num'));
        $show->field('forbidden_area', __('Forbidden area'));
        $show->field('standard', __('Standard'));
        $show->field('name', __('Name'));
        $show->field('product_no', __('Product no'));
        $show->field('brand', __('Brand'));
        $show->field('model', __('Model'));
        $show->field('manufacture', __('Manufacture'));
        $show->field('info_status', __('Info status'));
        $show->field('first_apply_at', __('First apply at'));
        $show->field('test_results', __('Test results'));
        $show->field('test_at', __('Test at'));
        $show->field('pics', __('Pics'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Machine());

        $watermark = public_path('img/shuiyin.png');

        $para = request()->route()->parameters;
        $id = $para['machine'];
        $data = Machine::find($id);
        $text = $data->model;

        $form->text('num', __('机械编码'))->required();
        $form->select('forbidden_area', __('禁用区内'))
            ->default(Machine::FORBIDDEN_AREA_DISABLE)
            ->options(Machine::getForbiddenStatus())
            ->required();
        $form->select('standard', __('国标'))
            ->default(Machine::STANDARD_QUALIFIED)
            ->options(Machine::getStandardStatus())
            ->required();
        $form->text('name', __('机械名'))->required();
        $form->text('product_no', __('机械编码'))->required();
        $form->text('brand', __('机械品牌'))->required();
        $form->text('model', __('机械型号'))->required();
        $form->text('manufacture', __('制造商'))->required();
        $form->select('info_status', __('信息状态'))
            ->default(Machine::INFO_STATUS_APPROVED)
            ->options(Machine::getApprovedStatus())
            ->required();
        $form->datetime('first_apply_at', __('首次申报时间'))
            ->default(date('Y-m-d H:i:s'));
        $form->textarea('test_results', __('审核结果'))->required();
        $form->datetime('test_at', __('审核时间'))
            ->default(date('Y-m-d H:i:s'));
        $form->multipleImage('pics',__('机械图片'))
            ->help('请上传多张图片，上传时按住ctrl键选择多张图片')
            ->removable()
            ->sortable()
            ->uniqueName()
            ->insert($watermark,'center')
            ->blur()
            ->widen(560)
            ->text($text,40,60,function($font) {
                $fontFile = public_path('img/wr.ttf');
                $font->file($fontFile);
                $font->size(24);
                $font->color('#efe6e6');
            })
            ->required();
        

        return $form;
    }
}

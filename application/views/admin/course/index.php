<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                        <pre>
                            <?php
                            print_r($courses);  
                            ?>
                        </pre>
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo anchor('course/create', '<i class="fa fa-plus"></i> '. lang('course_add'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div>
    
                                <div class="box-body">
                                     <?php if ($this->session->flashdata('message')): ?>
                                    <div class="alert alert-success alert-dismissible ">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                           <?php echo $this->session->flashdata('message'); ?>
                                      </div>
                                  <?php endif;?>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><?php echo lang('course_code');?></th>
                                                <th><?php echo lang('course_name');?></th>
                                                <th colspan="2"><?php echo lang('course_action');?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php foreach ($courses as $values):?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($values->course_code, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($values->course_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td>
                                                 <div class="btn-group">
                                                     
                                                     <?php echo anchor("course/edit/".$values->id, 
                                                                        "<i class='fa fa-pencil'></i> ".lang('course_edit'), 
                                                                        array('class' => 'btn btn-primary btn-flat',
                                                                               'title'=>lang('course_edit'))); ?>
                                                    <?php echo anchor("course/delete/".$values->id, 
                                                                        "<i class='fa fa-trash'></i> ".lang('course_delete'), 
                                                                        array('class' => 'btn btn-danger btn-flat',
                                                                               'title'=>lang('course_delete'))); ?>

                                                </td>
                                                </div>
                                            </tr>
<?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>

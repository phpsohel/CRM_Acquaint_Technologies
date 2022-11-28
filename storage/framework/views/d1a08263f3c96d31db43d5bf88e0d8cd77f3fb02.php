<?php $__env->startSection('content'); ?>
<?php if(session()->has('not_permitted')): ?>
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div> 
<?php endif; ?>
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4><?php echo e(trans('file.Group Permission')); ?></h4>
                    </div>
                    <?php echo Form::open(['route' => 'role.setPermission', 'method' => 'post']); ?>

                    <div class="card-body">
                    	<input type="hidden" name="role_id" value="<?php echo e($lims_role_data->id); ?>" />
						<div class="table-responsive">
						    <table class="table table-bordered permission-table">
						        <thead>
						        <tr>
						            <th colspan="5" class="text-center"><?php echo e($lims_role_data->name); ?> <?php echo e(trans('file.Group Permission')); ?></th>
						        </tr>
						        <tr>
						            <th rowspan="2" class="text-center">Module Name</th>
						            <th colspan="4" class="text-center">
						            	<div class="checkbox">
						            		<input type="checkbox" id="select_all">
						            		<label for="select_all"><?php echo e(trans('file.Permissions')); ?></label>
						            	</div>
						            </th>
						        </tr>
						        <tr>
						            <th class="text-center"><?php echo e(trans('file.View')); ?></th>
						            <th class="text-center"><?php echo e(trans('file.add')); ?></th>
						            <th class="text-center"><?php echo e(trans('file.edit')); ?></th>
						            <th class="text-center"><?php echo e(trans('file.delete')); ?></th>
						        </tr>
						        </thead>
						        <tbody>

								<tr>
									<td>Lead</td>
									<td class="text-center">
										<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead-index", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead-index" name="lead-index" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="lead-index" name="lead-index" />
												<?php endif; ?>
												<label for="lead-index"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead-add", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead-add" name="lead-add" checked>
												<?php else: ?>
													<input type="checkbox" value="1" id="lead-add" name="lead-add">
												<?php endif; ?>
												<label for="lead-add"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead-edit", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead-edit" name="lead-edit" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="lead-edit" name="lead-edit" />
												<?php endif; ?>
												<label for="lead-edit"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead-delete", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead-delete" name="lead-delete" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="lead-delete" name="lead-delete" />
												<?php endif; ?>
												<label for="lead-delete"></label>
											</div>
										</div>
									</td>
								</tr>


								<tr>
									<td>Lead Status</td>
									<td class="text-center">
										<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead_status-index", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead_status-index" name="lead_status-index" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="lead_status-index" name="lead_status-index" />
												<?php endif; ?>
												<label for="lead_status-index"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead_status-add", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead_status-add" name="lead_status-add" checked>
												<?php else: ?>
													<input type="checkbox" value="1" id="lead_status-add" name="lead_status-add">
												<?php endif; ?>
												<label for="lead_status-add"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead_status-edit", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead_status-edit" name="lead_status-edit" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="lead_status-edit" name="lead_status-edit" />
												<?php endif; ?>
												<label for="lead_status-edit"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead_status-delete", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead_status-delete" name="lead_status-delete" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="lead_status-delete" name="lead_status-delete" />
												<?php endif; ?>
												<label for="lead_status-delete"></label>
											</div>
										</div>
									</td>
								</tr>


								<tr>
									<td>Lead Source</td>
									<td class="text-center">
										<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead_source-index", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead_source-index" name="lead_source-index" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="lead_source-index" name="lead_source-index" />
												<?php endif; ?>
												<label for="lead_source-index"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead_source-add", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead_source-add" name="lead_source-add" checked>
												<?php else: ?>
													<input type="checkbox" value="1" id="lead_source-add" name="lead_source-add">
												<?php endif; ?>
												<label for="lead_source-add"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead_source-edit", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead_source-edit" name="lead_source-edit" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="lead_source-edit" name="lead_source-edit" />
												<?php endif; ?>
												<label for="lead_source-edit"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead_source-delete", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead_source-delete" name="lead_source-delete" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="lead_source-delete" name="lead_source-delete" />
												<?php endif; ?>
												<label for="lead_source-delete"></label>
											</div>
										</div>
									</td>
								</tr>


								<tr>
									<td>Lead Category</td>
									<td class="text-center">
										<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead_category-index", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead_category-index" name="lead_category-index" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="lead_category-index" name="lead_category-index" />
												<?php endif; ?>
												<label for="lead_category-index"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead_category-add", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead_category-add" name="lead_category-add" checked>
												<?php else: ?>
													<input type="checkbox" value="1" id="lead_category-add" name="lead_category-add">
												<?php endif; ?>
												<label for="lead_category-add"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead_category-edit", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead_category-edit" name="lead_category-edit" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="lead_category-edit" name="lead_category-edit" />
												<?php endif; ?>
												<label for="lead_category-edit"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("lead_category-delete", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead_category-delete" name="lead_category-delete" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="lead_category-delete" name="lead_category-delete" />
												<?php endif; ?>
												<label for="lead_category-delete"></label>
											</div>
										</div>
									</td>
								</tr>


								<tr>
									<td> Reminder</td>
									<td class="text-center">
										<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("remainder-index", $all_permission)): ?>
													<input type="checkbox" value="1" id="remainder-index" name="remainder-index" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="remainder-index" name="remainder-index" />
												<?php endif; ?>
												<label for="remainder-index"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("remainder-add", $all_permission)): ?>
													<input type="checkbox" value="1" id="lead_category-add" name="remainder-add" checked>
												<?php else: ?>
													<input type="checkbox" value="1" id="lead_category-add" name="remainder-add">
												<?php endif; ?>
												<label for="remainder-add"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("remainder-edit", $all_permission)): ?>
													<input type="checkbox" value="1" id="remainder-edit" name="remainder-edit" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="remainder-edit" name="remainder-edit" />
												<?php endif; ?>
												<label for="remainder-edit"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("remainder-delete", $all_permission)): ?>
													<input type="checkbox" value="1" id="remainder-delete" name="remainder-delete" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="remainder-delete" name="remainder-delete" />
												<?php endif; ?>
												<label for="remainder-delete"></label>
											</div>
										</div>
									</td>
								</tr>


								<tr>
									<td> Project</td>
									<td class="text-center">
										<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("project-index", $all_permission)): ?>
													<input type="checkbox" value="1" id="project-index" name="project-index" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="project-index" name="project-index" />
												<?php endif; ?>
												<label for="project-index"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("project-edit", $all_permission)): ?>
													<input type="checkbox" value="1" id="project-edit" name="project-edit" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="project-edit" name="project-edit" />
												<?php endif; ?>
												<label for="project-edit"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("project-delete", $all_permission)): ?>
													<input type="checkbox" value="1" id="project-delete" name="project-delete" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="project-delete" name="project-delete" />
												<?php endif; ?>
												<label for="project-delete"></label>
											</div>
										</div>
									</td>
								</tr>


								<tr>
									<td> Ticket</td>
									<td class="text-center">
										<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("ticket-index", $all_permission)): ?>
													<input type="checkbox" value="1" id="ticket-index" name="ticket-index" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="ticket-index" name="ticket-index" />
												<?php endif; ?>
												<label for="ticket-index"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("ticket-edit", $all_permission)): ?>
													<input type="checkbox" value="1" id="ticket-edit" name="ticket-edit" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="ticket-edit" name="ticket-edit" />
												<?php endif; ?>
												<label for="ticket-edit"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("ticket-delete", $all_permission)): ?>
													<input type="checkbox" value="1" id="ticket-delete" name="ticket-delete" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="ticket-delete" name="ticket-delete" />
												<?php endif; ?>
												<label for="ticket-delete"></label>
											</div>
										</div>
									</td>
								</tr>
								<tr>
						            <td><?php echo e(trans('file.product')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("products-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="products-index" name="products-index" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="products-index" name="products-index" />
								                <?php endif; ?>
								                <label for="products-index"></label>
							            	</div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("products-add", $all_permission)): ?>
								               	<input type="checkbox" value="1" id="products-add" name="products-add" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="products-add" name="products-add">
								                <?php endif; ?>
								                <label for="products-add"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("products-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="products-edit" name="products-edit" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="products-edit" name="products-edit" />
								                <?php endif; ?>
								                <label for="products-edit"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("products-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="products-delete" name="products-delete" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="products-delete" name="products-delete" />
								                <?php endif; ?>
								                <label for="products-delete"></label>
							                </div>
							            </div>
						            </td>
						        </tr>
						        <tr>
						            <td><?php echo e(trans('file.Sale')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("sales-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="sales-index" name="sales-index" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="sales-index" name="sales-index">
								                <?php endif; ?>
								                <label for="sales-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("sales-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="sales-edit" name="sales-edit" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="sales-edit" name="sales-edit">
								                <?php endif; ?>
								                <label for="sales-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("sales-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="sales-delete" name="sales-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="sales-delete" name="sales-delete">
								                <?php endif; ?>
								                <label for="sales-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>



								<tr>
									<td>Expense Category</td>
									<td class="text-center">
										<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("expense_categories-index", $all_permission)): ?>
													<input type="checkbox" value="1" id="expense_categories-index" name="expense_categories-index" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="expense_categories-index" name="expense_categories-index">
												<?php endif; ?>
												<label for="expense_categories-index"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("expense_categories-add", $all_permission)): ?>
													<input type="checkbox" value="1" id="expense_categories-add" name="expense_categories-add" checked />
												<?php else: ?>
													<input type="checkbox" value="1" id="expense_categories-add" name="expense_categories-add">
												<?php endif; ?>
												<label for="expense_categories-add"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("expense_categories-edit", $all_permission)): ?>
													<input type="checkbox" value="1" id="expense_categories-edit" name="expense_categories-edit" checked>
												<?php else: ?>
													<input type="checkbox" value="1" id="expense_categories-edit" name="expense_categories-edit">
												<?php endif; ?>
												<label for="expense_categories-edit"></label>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
											<div class="checkbox">
												<?php if(in_array("expense_categories-delete", $all_permission)): ?>
													<input type="checkbox" value="1" id="expense_categories-delete" name="expense_categories-delete" checked>
												<?php else: ?>
													<input type="checkbox" value="1" id="expense_categories-delete" name="expense_categories-delete">
												<?php endif; ?>
												<label for="expense_categories-delete"></label>
											</div>
										</div>
									</td>
								</tr>



						        <tr>
						            <td><?php echo e(trans('file.Expense')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("expenses-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="expenses-index" name="expenses-index" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="expenses-index" name="expenses-index">
								                <?php endif; ?>
								                <label for="expenses-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("expenses-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="expenses-add" name="expenses-add" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="expenses-add" name="expenses-add">
								                <?php endif; ?>
								                <label for="expenses-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("expenses-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="expenses-edit" name="expenses-edit" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="expenses-edit" name="expenses-edit">
								                <?php endif; ?>
								                <label for="expenses-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("expenses-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="expenses-delete" name="expenses-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="expenses-delete" name="expenses-delete">
								                <?php endif; ?>
								                <label for="expenses-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>

						        <tr>
						            <td><?php echo e(trans('file.Quotation')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("quotes-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="quotes-index" name="quotes-index" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="quotes-index" name="quotes-index">
								                <?php endif; ?>
								                <label for="quotes-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("quotes-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="quotes-add" name="quotes-add" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="quotes-add" name="quotes-add">
								                <?php endif; ?>
								                <label for="quotes-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("quotes-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="quotes-edit" name="quotes-edit" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="quotes-edit" name="quotes-edit">
								                <?php endif; ?>
								                <label for="quotes-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("quotes-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="quotes-delete" name="quotes-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="quotes-delete" name="quotes-delete">
								                <?php endif; ?>
								                <label for="quotes-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>
						        <tr>
						            <td><?php echo e(trans('file.Employee')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("employees-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="employees-index" name="employees-index" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="employees-index" name="employees-index">
								                <?php endif; ?>
								                <label for="employees-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("employees-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="employees-add" name="employees-add" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="employees-add" name="employees-add">
								                <?php endif; ?>
								                <label for="employees-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("employees-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="employees-edit" name="employees-edit" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="employees-edit" name="employees-edit">
								                <?php endif; ?>
								                <label for="employees-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("employees-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="employees-delete" name="employees-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="employees-delete" name="employees-delete">
								                <?php endif; ?>
								                <label for="employees-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>
						        <tr>
						            <td><?php echo e(trans('file.User')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("users-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="users-index" name="users-index" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="users-index" name="users-index">
								                <?php endif; ?>
								                <label for="users-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("users-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="users-add" name="users-add" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="users-add" name="users-add">
								                <?php endif; ?>
								                <label for="users-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("users-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="users-edit" name="users-edit" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="users-edit" name="users-edit">
								                <?php endif; ?>
								                <label for="users-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("users-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="users-delete" name="users-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="users-delete" name="users-delete">
								                <?php endif; ?>
								                <label for="users-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>
						        <tr>
						            <td><?php echo e(trans('file.customer')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("customers-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="customers-index" name="customers-index" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="customers-index" name="customers-index">
								                <?php endif; ?>
								                <label for="customers-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("customers-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="customers-add" name="customers-add" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="customers-add" name="customers-add">
								                <?php endif; ?>
								                <label for="customers-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("customers-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="customers-edit" name="customers-edit" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="customers-edit" name="customers-edit">
								                <?php endif; ?>
								                <label for="customers-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("customers-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="customers-delete" name="customers-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="customers-delete" name="customers-delete">
								                <?php endif; ?>
								                <label for="customers-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>

								<tr>
									<td><?php echo e(trans('file.Miscellaneous')); ?></td>
									<td class="report-permissions" colspan="5">
						            	<span>
								            <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("create_sale", $all_permission)): ?>
														<input type="checkbox" value="1" id="create_sale" name="create_sale" checked>
													<?php else: ?>
														<input type="checkbox" value="1" id="create_sale" name="create_sale">
													<?php endif; ?>
													<label for="create_sale" class="padding05">Create Sale</label>
								                </div>
								            </div>
						            	</span>
										<span>
						            		<div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("create_project", $all_permission)): ?>
														<input type="checkbox" value="1" id="create_project" name="create_project" checked>
													<?php else: ?>
														<input type="checkbox" value="1" id="create_project" name="create_project">
													<?php endif; ?>
													<label for="create_project" class="padding05">Create Project</label>
								                </div>
								            </div>
						            	</span>
										<span>
						            		<div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("add_payment", $all_permission)): ?>
														<input type="checkbox" value="1" id="add_payment" name="add_payment" checked>
													<?php else: ?>
														<input type="checkbox" value="1" id="add_payment" name="add_payment">
													<?php endif; ?>
													<label for="add_payment" class="padding05"> Add Payment</label>
								                </div>
								            </div>
						            	</span>
										<span>
						            		<div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("view_payment", $all_permission)): ?>
														<input type="checkbox" value="1" id="view_payment" name="view_payment" checked>
													<?php else: ?>
														<input type="checkbox" value="1" id="view_payment" name="view_payment">
													<?php endif; ?>
													<label for="view_payment" class="padding05">  View Payment</label>
								                </div>
								            </div>
						            	</span>

										<span>
						            		<div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("create_ticket", $all_permission)): ?>
														<input type="checkbox" value="1" id="create_ticket" name="create_ticket" checked>
													<?php else: ?>
														<input type="checkbox" value="1" id="create_ticket" name="create_ticket">
													<?php endif; ?>
													<label for="create_ticket" class="padding05">  Create Ticket </label>
								                </div>
								            </div>
						            	</span>

										<span>
						            		<div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("create_ticket_reply", $all_permission)): ?>
														<input type="checkbox" value="1" id="create_ticket_reply" name="create_ticket_reply" checked>
													<?php else: ?>
														<input type="checkbox" value="1" id="create_ticket_reply" name="create_ticket_reply">
													<?php endif; ?>
													<label for="create_ticket_reply" class="padding05">  Create Ticket Reply </label>
								                </div>
								            </div>
						            	</span>
									</td>
								</tr>
						        <tr>
						            <td>HRM</td>
						            <td class="report-permissions" colspan="5">
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("department", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="department" name="department" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="department" name="department">
							                    	<?php endif; ?>
								                    <label for="department" class="padding05"><?php echo e(trans('file.Department')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("attendance", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="attendance" name="attendance" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="attendance" name="attendance">
							                    	<?php endif; ?>
								                    <label for="attendance" class="padding05"><?php echo e(trans('file.Attendance')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("payroll", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="payroll" name="payroll" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="payroll" name="payroll">
							                    	<?php endif; ?>
								                    <label for="payroll" class="padding05"><?php echo e(trans('file.Payroll')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("holiday", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="holiday" name="holiday" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="holiday" name="holiday">
							                    	<?php endif; ?>
								                    <label for="holiday" class="padding05"><?php echo e(trans('file.Holiday Approve')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						            </td>
						        </tr>



						        <tr>
						            <td><?php echo e(trans('file.Reports')); ?></td>
						            <td class="report-permissions" colspan="5">
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("payment-report", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="payment-report" name="payment-report" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="payment-report" name="payment-report">
							                    	<?php endif; ?>
								                    <label for="payment-report" class="padding05"><?php echo e(trans('file.Payment Report')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("sale-report", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="sale-report" name="sale-report" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="sale-report" name="sale-report">
							                    	<?php endif; ?>
								                    <label for="sale-report" class="padding05"><?php echo e(trans('file.Sale Report')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
								        <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("user-report", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="user-report" name="user-report" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="user-report" name="user-report">
							                    	<?php endif; ?>
								                    <label for="user-report" class="padding05"><?php echo e(trans('file.User Report')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("customer-report", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="customer-report" name="customer-report" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="customer-report" name="customer-report">
							                    	<?php endif; ?>
								                    <label for="customer-report" class="padding05"><?php echo e(trans('file.Customer Report')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>

						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("due-report", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="due-report" name="due-report" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="due-report" name="due-report">
							                    	<?php endif; ?>
								                    <label for="due-report" class="padding05"><?php echo e(trans('file.Due Report')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						            </td>
						        </tr>
						        <tr>
						            <td><?php echo e(trans('file.settings')); ?></td>
						            <td class="report-permissions" colspan="5">
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("send_notification", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="send_notification" name="send_notification" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="send_notification" name="send_notification">
							                    	<?php endif; ?>
								                    <label for="send_notification" class="padding05"><?php echo e(trans('file.Send Notification')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>

						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("customer_group", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="customer_group" name="customer_group" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="customer_group" name="customer_group">
							                    	<?php endif; ?>
								                    <label for="customer_group" class="padding05"><?php echo e(trans('file.Customer Group')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
								            <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("brand", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="brand" name="brand" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="brand" name="brand">
							                    	<?php endif; ?>
								                    <label for="brand" class="padding05"><?php echo e(trans('file.Brand')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>

										<span>
								            <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("category", $all_permission)): ?>
														<input type="checkbox" value="1" id="category" name="category" checked>
													<?php else: ?>
														<input type="checkbox" value="1" id="category" name="category">
													<?php endif; ?>
													<label for="category" class="padding05"><?php echo e(trans('file.category')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						            	</span>

						                <span>
								            <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("unit", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="unit" name="unit" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="unit" name="unit">
							                    	<?php endif; ?>
								                    <label for="unit" class="padding05"><?php echo e(trans('file.Unit')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
								            <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("currency", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="currency" name="currency" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="currency" name="currency">
							                    	<?php endif; ?>
								                    <label for="currency" class="padding05"><?php echo e(trans('file.Currency')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>

						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("backup_database", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="backup_database" name="backup_database" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="backup_database" name="backup_database">
							                    	<?php endif; ?>
								                    <label for="backup_database" class="padding05"><?php echo e(trans('file.Backup Database')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>

										<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("empty_database", $all_permission)): ?>
														<input type="checkbox" value="1" id="empty_database" name="empty_database" checked>
													<?php else: ?>
														<input type="checkbox" value="1" id="empty_database" name="empty_database">
													<?php endif; ?>
													<label for="empty_database" class="padding05">Empty Database&nbsp;</label>
								                </div>
								            </div>
						                </span>
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("general_setting", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="general_setting" name="general_setting" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="general_setting" name="general_setting">
							                    	<?php endif; ?>
								                    <label for="general_setting" class="padding05"><?php echo e(trans('file.General Setting')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("hrm_setting", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="hrm_setting" name="hrm_setting" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="hrm_setting" name="hrm_setting">
							                    	<?php endif; ?>
								                    <label for="hrm_setting" class="padding05"><?php echo e(trans('file.HRM Setting')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						            </td>
						        </tr>

						        </tbody>
						    </table>
						</div>
						<div class="form-group">
	                        <input type="submit" value="<?php echo e(trans('file.submit')); ?>" class="btn btn-primary">
	                    </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

	$("ul#setting").siblings('a').attr('aria-expanded','true');
    $("ul#setting").addClass("show");
    $("ul#setting #role-menu").addClass("active");

	$("#select_all").on( "change", function() {
	    if ($(this).is(':checked')) {
	        $("tbody input[type='checkbox']").prop('checked', true);
	    } 
	    else {
	        $("tbody input[type='checkbox']").prop('checked', false);
	    }
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm\resources\views/role/permission.blade.php ENDPATH**/ ?>
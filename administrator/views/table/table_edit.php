<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Smart Restaurant
 *
 * An open source application to manage restaurants
 *
 * @package		SmartRestaurant
 * @author		Gjergj Sheldija
 * @copyright	Copyright (c) 2008-2012, Gjergj Sheldija
 * @license		http://www.gnu.org/licenses/gpl.txt
 * @since		Version 1.0
 * @filesource
 * 
 *  Smart Restaurant is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License as published by
 *	the Free Software Foundation, version 3 of the License.
 *
 *	Smart Restaurant is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.

 *	You should have received a copy of the GNU General Public License
 *	along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 */
?>
<div class="hastable">
<?php if( isset($edit) ) { 
echo form_open('table/save');?>
<table>
	<tbody>
		<tr>
			<td><?php echo form_hidden('id',$edit[0]->id) ?> <?php echo form_label(lang('name'));?> :</td>
			<td><?php echo form_input(array('name' => 'name','value' => $edit[0]->name,'class' => 'field text medium')); ?></td>
		</tr>
		<tr>
			<td><?php echo form_label(lang('order_nr'));?> :</td>
			<td><?php echo form_input(array('name' => 'ordernum','value' => $edit[0]->ordernum,'class' => 'field text medium'));?></td>
		</tr>
		<tr>
			<td><?php echo form_label(lang('visible'));?> :</td>
			<td><?php echo form_checkbox('visible',1,$edit[0]->visible); ?></td>
		</tr>
		<tr>
			<td><?php echo form_fieldset(lang('user')); ?></td>
			<td>
				<?php 
				foreach($users as $user ) {
					$exist = FALSE;
					if(stripos( $edit[0]->locktouser,$user['id'], 0) !== FALSE ) $exist = TRUE;
					echo form_checkbox(array('name' => 'locktouser[' .$user['id']. ']','value' => $user['id'],'checked' => $exist));
					echo form_label($user['name']);
					echo '<br />';					
				}
				echo form_fieldset_close();
				echo strpos($user['id'],$edit[0]->locktouser) === true;
				?>
			</td>
		</tr>		
		<tr>
			<td></td>
			<td><input type="submit" value="<?php echo lang('save'); ?>" class="ui-state-default ui-corner-all float-right"></td>
		</tr>
	</tbody>
</table>	
</form>
<?php } elseif( isset($newtable) ) {
echo form_open('table/addnew');?>
<table>
	<tbody>
		<tr>
			<td><?php echo form_hidden('id') ?> <?php echo form_label(lang('name'));?> :</td>
			<td><?php echo form_input(array('name'=>'name','class' => 'field text medium')); ?></td>
		</tr>
		<tr>
			<td><?php echo form_label(lang('order_nr'));?> :</td>
			<td><?php echo form_input(array('name' => 'ordernum','class' => 'field text medium'));?></td>
		</tr>
		<tr>
			<td><?php echo form_label(lang('visible'));?> :</td>
			<td><?php echo form_checkbox('visible',1); ?></td>
		</tr>
		<tr>
			<td><?php echo form_fieldset(lang('user')); ?></td>
			<td>
				<?php 
				echo form_fieldset(lang('user'));
				foreach($users as $user ) {
					echo form_checkbox('locktouser[' .$user['id']. ']',$user['id'] );
					echo form_label($user['name']);
					echo '<br />';
				}
				echo form_fieldset_close();
				?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="<?php echo lang('save'); ?>" class="ui-state-default ui-corner-all float-right"></td>
		</tr>
	</tbody>
</table>	
</form>
<?php } ?>
</div>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Name:  Auth Lang - English
 *
 * Author: Ben Edmunds
 * 		  ben.edmunds@gmail.com
 *         @benedmunds
 *
 * Author: Daniel Davis
 *         @ourmaninjapan
 *
 * Location: http://github.com/benedmunds/ion_auth/
 *
 * Created:  03.09.2013
 *
 * Description:  English language file for Ion Auth example views
 *
 */

// Errors
$lang['error_csrf'] = 'This form post did not pass our security checks.';

// Login
$lang['login_heading']         = 'Login';
$lang['login_subheading']      = 'Silahkan login menggunakan email anda/username and password below.';
$lang['login_identity_label']  = 'Email/Username:';
$lang['login_password_label']  = 'Password:';
$lang['login_remember_label']  = 'Ingat Saya:';
$lang['login_submit_btn']      = 'Login';
$lang['login_forgot_password'] = 'Lupa Password?';

// Index
$lang['index_heading']           = 'Pengguna';
$lang['index_subheading']        = 'Below is a list of the users.';
$lang['index_fname_th']          = 'Nama Awal';
$lang['index_lname_th']          = 'Nama Akhir';
$lang['index_username_th']       = 'Username';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Groups';
$lang['index_status_th']         = 'Status';
$lang['index_action_th']         = 'Action';
$lang['index_active_link']       = 'Aktif';
$lang['index_inactive_link']     = 'Tidak Aktif';
$lang['index_create_user_link']  = 'Tambah User Baru';
$lang['index_create_group_link'] = 'Tambah Grup Baru';

// Deactivate User
$lang['deactivate_heading']                  = 'Deactivate User';
$lang['deactivate_subheading']               = 'Are you sure you want to deactivate the user \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Yes';
$lang['deactivate_confirm_n_label']          = 'No';
$lang['deactivate_submit_btn']               = 'Submit';
$lang['deactivate_validation_confirm_label'] = 'confirmation';
$lang['deactivate_validation_user_id_label'] = 'user ID';

// Create User
$lang['create_user_heading']                           = 'Tambah User';
$lang['create_user_subheading']                        = 'Please enter the user\'s information below.';
$lang['create_user_fname_label']                       = 'First Name:';
$lang['create_user_lname_label']                       = 'Last Name:';
$lang['create_user_company_label']                     = 'Company Name:';
$lang['create_user_identity_label']                    = 'Username:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'Phone:';
$lang['create_user_password_label']                    = 'Password:';
$lang['create_user_password_confirm_label']            = 'Confirm Password:';
$lang['create_user_submit_btn']                        = 'Create User';
$lang['create_user_validation_fname_label']            = 'First Name';
$lang['create_user_validation_lname_label']            = 'Last Name';
$lang['create_user_validation_identity_label']         = 'Identity';
$lang['create_user_validation_email_label']            = 'Email Address';
$lang['create_user_validation_phone_label']            = 'Phone';
$lang['create_user_validation_company_label']          = 'Company Name';
$lang['create_user_validation_password_label']         = 'Password';
$lang['create_user_validation_password_confirm_label'] = 'Password Confirmation';

// Edit User
$lang['edit_user_heading']                           = 'Edit User';
$lang['edit_user_subheading']                        = 'Please enter the user\'s information below.';
$lang['edit_user_fname_label']                       = 'First Name:';
$lang['edit_user_lname_label']                       = 'Last Name:';
$lang['edit_user_company_label']                     = 'Company Name:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Phone:';
$lang['edit_user_password_label']                    = 'Password:';
$lang['edit_user_password_confirm_label']            = 'Confirm Password:';
$lang['edit_user_groups_heading']                    = 'Member of groups';
$lang['edit_user_submit_btn']                        = 'Save User';
$lang['edit_user_validation_fname_label']            = 'First Name';
$lang['edit_user_validation_lname_label']            = 'Last Name';
$lang['edit_user_validation_email_label']            = 'Email Address';
$lang['edit_user_validation_phone_label']            = 'Phone';
$lang['edit_user_validation_company_label']          = 'Company Name';
$lang['edit_user_validation_groups_label']           = 'Groups';
$lang['edit_user_validation_password_label']         = 'Password';
$lang['edit_user_validation_password_confirm_label'] = 'Password Confirmation';

// Create Group
$lang['create_group_title']                  = 'Create Group';
$lang['create_group_heading']                = 'Create Group';
$lang['create_group_subheading']             = 'Please enter the group information below.';
$lang['create_group_name_label']             = 'Group Name:';
$lang['create_group_desc_label']             = 'Description:';
$lang['create_group_submit_btn']             = 'Create Group';
$lang['create_group_validation_name_label']  = 'Group Name';
$lang['create_group_validation_desc_label']  = 'Deskripsi';

// Edit Group
$lang['edit_group_title']                  = 'Edit Group';
$lang['edit_group_saved']                  = 'Grup Disimpan';
$lang['edit_group_heading']                = 'Edit Group';
$lang['edit_group_subheading']             = 'Silakan masukkan informasi grup di bawah ini.';
$lang['edit_group_name_label']             = 'Nama Grup:';
$lang['edit_group_desc_label']             = 'Deskripsi:';
$lang['edit_group_submit_btn']             = 'Simpan Grup';
$lang['edit_group_validation_name_label']  = 'Nama Grup';
$lang['edit_group_validation_desc_label']  = 'Deskripsi';

// Change Password
$lang['change_password_heading']                               = 'Ganti Password';
$lang['change_password_old_password_label']                    = 'Password Lama:';
$lang['change_password_new_password_label']                    = 'Password Baru (min %s Karakter):';
$lang['change_password_new_password_confirm_label']            = 'Konfirmasi New Password:';
$lang['change_password_submit_btn']                            = 'Ganti';
$lang['change_password_validation_old_password_label']         = 'Password Lama';
$lang['change_password_validation_new_password_label']         = 'Password Baru';
$lang['change_password_validation_new_password_confirm_label'] = 'Konfirmasi Password Baru';

// Forgot Password
$lang['forgot_password_heading']                 = 'Lupa Password';
$lang['forgot_password_subheading']              = 'Please enter your %s so we can send you an email to reset your password.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Submit';
$lang['forgot_password_validation_email_label']  = 'Alamat Email';
$lang['forgot_password_identity_label'] = 'Identitas';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'Tidak ada catatan dari alamat email itu.';
$lang['forgot_password_identity_not_found']         = 'Tidak ada catatan dari nama pengguna itu.';

// Reset Password
$lang['reset_password_heading']                               = 'Ganti Password';
$lang['reset_password_new_password_label']                    = 'Password Baru (paling sedikit %s Karakter):';
$lang['reset_password_new_password_confirm_label']            = 'Konfirmasi Password baru:';
$lang['reset_password_submit_btn']                            = 'Ganti';
$lang['reset_password_validation_new_password_label']         = 'Password Baru';
$lang['reset_password_validation_new_password_confirm_label'] = 'Konfirmasi Password Baru';

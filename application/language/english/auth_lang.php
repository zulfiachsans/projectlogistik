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
$lang['error_csrf'] = 'Posting formulir ini tidak lolos pemeriksaan keamanan kami.';

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
$lang['index_subheading']        = 'Di bawah ini adalah daftar pengguna..';
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
$lang['deactivate_heading']                  = 'Nonaktifkan Pengguna';
$lang['deactivate_subheading']               = 'Apakah Anda yakin ingin menonaktifkan pengguna \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Ya';
$lang['deactivate_confirm_n_label']          = 'Tidak';
$lang['deactivate_submit_btn']               = 'Submit';
$lang['deactivate_validation_confirm_label'] = 'Konfirmasi';
$lang['deactivate_validation_user_id_label'] = 'ID Pengguna';

// Create User
$lang['create_user_heading']                           = 'Tambah User';
$lang['create_user_subheading']                        = 'Harap masukkan informasi pengguna di bawah ini.';
$lang['create_user_fname_label']                       = 'Nama Awal:';
$lang['create_user_lname_label']                       = 'Nama Akhir:';
$lang['create_user_company_label']                     = 'Nama Perusahaan:';
$lang['create_user_identity_label']                    = 'Username:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'Nomor Telephone:';
$lang['create_user_password_label']                    = 'Password:';
$lang['create_user_password_confirm_label']            = 'Konfirmasi Password:';
$lang['create_user_submit_btn']                        = 'Tambah User';
$lang['create_user_validation_fname_label']            = 'Nama Awal';
$lang['create_user_validation_lname_label']            = 'Nama Akhir';
$lang['create_user_validation_identity_label']         = 'Identitas';
$lang['create_user_validation_email_label']            = 'Alamat Email';
$lang['create_user_validation_phone_label']            = 'Nomor telephone';
$lang['create_user_validation_company_label']          = 'Nama Perusahaan';
$lang['create_user_validation_password_label']         = 'Password';
$lang['create_user_validation_password_confirm_label'] = 'Konfirmasi Password';

// Edit User
$lang['edit_user_heading']                           = 'Edit Pengguna';
$lang['edit_user_subheading']                        = 'Silakan masukkan informasi Pengguna di bawah ini.';
$lang['edit_user_fname_label']                       = 'Nama Awal:';
$lang['edit_user_lname_label']                       = 'Nama Akhir:';
$lang['edit_user_company_label']                     = 'Nama Perusahaan:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Nomor telephone:';
$lang['edit_user_password_label']                    = 'Password:';
$lang['edit_user_password_confirm_label']            = 'Konfirmasi Password:';
$lang['edit_user_groups_heading']                    = 'Anggota Group';
$lang['edit_user_submit_btn']                        = 'Simpan User';
$lang['edit_user_validation_fname_label']            = 'Nama Awal';
$lang['edit_user_validation_lname_label']            = 'Nama Akhir';
$lang['edit_user_validation_email_label']            = 'Alamat Email';
$lang['edit_user_validation_phone_label']            = 'Nomor telephone';
$lang['edit_user_validation_company_label']          = 'Nama Perusahaan';
$lang['edit_user_validation_groups_label']           = 'Groups';
$lang['edit_user_validation_password_label']         = 'Password';
$lang['edit_user_validation_password_confirm_label'] = 'Konfirmasi Password';

// Create Group
$lang['create_group_title']                  = 'Tambah Group';
$lang['create_group_heading']                = 'Tambah Group';
$lang['create_group_subheading']             = 'Silakan masukkan informasi grup di bawah ini.';
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
$lang['forgot_password_subheading']              = 'Harap Masukkan %s sehingga kami dapat mengirimkan email untuk mengatur ulang kata sandi Anda.';
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

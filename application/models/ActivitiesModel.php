<?php 
class ActivitiesModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Numero de notificaciones pendientes
    public function number_of_pending_notifications($user)
    {
        return $this->db->from('notifications')->like('user_notification', $user)->where(array('status' => 1, 'disable' => 0))->count_all_results();
    }

    # Todas las notificaciones
    public function all_notification_details($user)
    {
        return $this->db->select('notifications, type_of_notification, ip_error_access, date, status')->where(array('disable' => 0, 'user_notification' => $this->session->userdata['user']['id_user']))->order_by('notifications', 'DESC')->get('notifications')->result_array(); 
    }

    # Detalles de las notificaciones
    public function notification_details_single($notification)
    {
        return $this->db->select('notifications, type_of_notification, ip_error_access, date')->where('notifications', $notification)->get('notifications')->result_array(); 
    }

    # Detalles de las notificaciones
    public function notification_details($user)
    {
        return $this->db->select('notifications, type_of_notification, ip_error_access, date')->like('user_notification', $user)->where(array('status' => 1, 'disable' => 0))->order_by('notifications', 'DESC')->get('notifications')->result_array(); 
    }

    # Notificación verificada
    public function discounting_notification($notification)
    {
        $this->db->set(array('status' => 0, 'disable' => 0))->where('notifications', $notification)->update('notifications');
    }

    # Eliminar notificaciones
    public function delete_notifications($notification)
    {
        $this->db->set(array('status' => 0, 'disable' => 1))->where('notifications', $notification)->update('notifications');
    }

}
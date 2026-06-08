public function hapus($id)
{
    $this->db->where('id',$id);
    $this->db->delete('supir');

    redirect('admin/supir');
}
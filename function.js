function data(rumus){
	var konek;
	konek=mysqli_query($koneksi,+rumus);
	return konek
}
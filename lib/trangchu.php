<?php 
	//tin bên trái 
	function TinMoiNhat_MotTin() 
	{
	 $qr = "
		 	SELECT * FROM tin 
			ORDER BY idTin DESC
			LIMIT 0,1
		";
		return mysql_query($qr);
	}
	function TinMoiNhat_BonTin() 
	{
	 $qr = "
	 		SELECT idTin, TieuDe FROM tin 
	 		ORDER BY idTin DESC 
	 		LIMIT 1,10
	 	";
		return mysql_query($qr);
	}
	function TinXemNhieuNhat() 
	{
		$qr = "
			SELECT * FROM tin 
			ORDER BY SoLanXem DESC
			LIMIT 0,6
		";
		return mysql_query($qr);
	}

	//tin bên phải

	function TinMoiNhat_TheoLoaiTin_MotTin($idLT) 
	{
	 $qr = "
		 	SELECT * FROM tin 
		 	WHERE idLT=$idLT
			ORDER BY idTin DESC
			LIMIT 0,1
		";
		return mysql_query($qr);
	}
	function TinMoiNhat_TheoLoaiTin_BonTin($idLT) 
	{
	 $qr = "
	 		SELECT idTin, TieuDe FROM tin
	 		WHERE idLT=$idLT 
	 		ORDER BY idTin DESC 
	 		LIMIT 1,6
	 	";
		return mysql_query($qr);
	}

	function TenLoaiTin($idLT) 
	{
	 $qr = "
	 		SELECT Ten FROM loaitin
	 		WHERE idLT=$idLT 
	 	";
		return mysql_query($qr);
	}

	function QuangCao($vitri) 
	{
		$qr = "
	 		SELECT * FROM quangcao
	 		WHERE vitri=$vitri 
	 	";
	 	return mysql_query($qr);
	}

	function DanhSachTheLoai() 
	{
		$qr = "
	 		SELECT * FROM theloai
	 	";
	 	return mysql_query($qr);
	}

	function DanhSachLoaiTin_Theo_TheLoai($idTL) 
	{
		$qr = "
	 		SELECT * FROM loaitin
	 		WHERE idTL=$idTL 
	 	";
	 	return mysql_query($qr);
	}
	function TinMoi_BenTrai($idTL)
	{
		$qr = "
			SELECT * FROM tin
			WHERE idTL = $idTL
			ORDER BY idTin DESC
			LIMIT 0,1
		";
		return mysql_query($qr);
	}
	function TinMoi_BenPhai($idTL)
	{
	 	$qr = "
			SELECT * FROM tin 
			WHERE  idTL = $idTL
			ORDER BY idTin DESC
			LIMIT 1,2
		";
		return mysql_query($qr);
	}
	function TinTheoLoaiTin($idLT)
	{
	 	$qr = "
			SELECT * FROM tin 
			WHERE  idLT = $idLT
			ORDER BY idTin DESC
		";
		return mysql_query($qr);
	} 
	//phân trang
	function TinTheoLoaiTin_PhanTrang($idLT,$form,$sotin1trang)
	{
	 	$qr = "
			SELECT * FROM tin 
			WHERE  idLT = $idLT
			ORDER BY idTin DESC
			LIMIT $form, $sotin1trang
		";
		return mysql_query($qr);
	} 
	//end phân trang



	function breadCrumb($idLT)
	{
	 	$qr = "
			SELECT TenTL, Ten 
			FROM theloai, loaitin 
			WHERE theloai.idTL = loaitin.idTL 
			AND idLT = $idLT
		";
		return mysql_query($qr);
	} 

	function ChiTietTin($idTin) 
	{
		$qr = "
			SELECT * 
			FROM tin 
			WHERE idTin = $idTin
		";
		return mysql_query($qr);
	}
	
	function TinCungLoaiTin($idTin,$idLT) 
	{
		$qr = "
			SELECT idTin,TieuDe,urlHinh,SoLanXem
			FROM tin 
			WHERE idTin <>$idTin
			AND idLT= $idLT
			ORDER BY RAND()
			LIMIT 0,3
		";
		return mysql_query($qr);
	}

	function CapNhatSoLanXemTin($idTin) 
	{
		$qr = "
			UPDATE tin 
			SET SoLanXem = SoLanXem + 1
			WHERE idTin = $idTin
		";
		mysql_query($qr);
	}
	// hàm tìm kiếm 
	function TimKiem($tukhoa) 
	{
		$qr = "
			SELECT * 
			FROM tin 
			WHERE TieuDe REGEXP '$tukhoa'
		";
		return mysql_query($qr);
	}

?>
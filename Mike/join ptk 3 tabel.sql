select dbo.ptk_terdaftar.*, dbo.ptk.*, dbo.sekolah.*
from  dbo.ptk_terdaftar full join dbo.ptk
on dbo.ptk_terdaftar.ptk_id = dbo.ptk.ptk_id
full join dbo.sekolah
on dbo.ptk_terdaftar.sekolah_id = dbo.sekolah.sekolah_id
where dbo.sekolah.desa_kelurahan = 'Kapuk'

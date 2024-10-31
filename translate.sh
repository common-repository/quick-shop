
#!/bin/bash
for lang in nb_NO sv_SE;do
  if [ ! -f language/quick-shop-$lang.po ];then
    xgettext --keyword=__ --keyword=_e  --keyword=_n --default-domain=xsnp --language=php *.php */*.php --output=language/quick-shop-$lang.po
    echo '(New Translation)'
  else    
    xgettext -j --keyword=__ --keyword=_e  --keyword=_n --default-domain=xsnp --language=php *.php */*.php  --output=language/quick-shop-$lang.po
    msgfmt -o language/quick-shop-$lang.mo language/quick-shop-$lang.po
  fi
done
xgettext  --keyword=__ --keyword=_e  --keyword=_n --default-domain=xsnp --language=php *.php */*.php */*.php --output=language/quick-shop.pot

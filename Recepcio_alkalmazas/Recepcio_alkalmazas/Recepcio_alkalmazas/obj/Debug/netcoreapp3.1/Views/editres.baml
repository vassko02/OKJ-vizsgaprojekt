   M S B A M L   `   `   `  ����N  JRecepcio_alkalmazas, Version=1.0.0.0, Culture=neutral, PublicKeyToken=nullE'clr-namespace:Recepcio_alkalmazas.ViewsRecepcio_alkalmazas.Views  5   	   '    !Recepcio_alkalmazas.Views.editres   5   	   W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35e aSystem.Windows.Controls.Ribbon, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35F 9http://schemas.microsoft.com/winfx/2006/xaml/presentation     5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   9local'clr-namespace:Recepcio_alkalmazas.Views     5   	   c _MahApps.Metro.IconPacks.Core, Version=4.0.0.0, Culture=neutral, PublicKeyToken=0c0d510f9915137ag cMahApps.Metro.IconPacks.Material, Version=4.0.0.0, Culture=neutral, PublicKeyToken=0c0d510f9915137a?	iconPacks-http://metro.mahapps.com/winfx/xaml/iconpacks   5   	     � Title$  editres��5	   	   $	��590��6   $	��400��6&    � WindowStartupLocation$ CenterScreen=�62    � WindowStyle$
 None=�6W    � 
ResizeMode$ NoResize=�6j    � AllowsTransparency$ False��6�   .��5
      �� $��2q�6   
������._�5      � -   5         � RowDefinitions 5   
   �� 5      $��60 �6   �� 5      $
��auto �6   �� 5      $	��160 �6   �� 5      $
��auto �6   �� 5      $
��auto �6   �� 5      $��60 �6    � ColumnDefinitions 5   
   �� 5      $��* �6   �� 5      $��* �6   ��5   
   �� 5       �� ImageSource$ ../img/hatter.jpg��6   .+�5   
   �� -   5        $��sp_level��5   6   $��0��6   $��2��6"   .+�5      ��  �� Orientation$ 
Horizontal=�6   .+�5      �� $	��200��6   .+�5      �� -   5        $��	lbl_title��5   3   $��Guest level:��6   $��18(�6D   $
��Bold"�6R   �� 5       -   5        $��	lbl_level��5       $
��Bold"�6-   $��16(�6?   5!      �� 5"      .+�5#      �� -   5        $��lbl_discounttitle��5#   0   $��	Discount:��6   $��18(�6I   $
��Bold"�6W   �� 5$      -   5        $��lbl_discount��5$   +   $��16(�6   $
��Bold"�6?   5%      5&      5'      �� 5(   
   $��2��6   $��1��6)   .+�5)      �� $��Reservation data:��6   $��20(�60   
������$
��Bold"�6Y   $��5q�6k   $��Center=�6v   �� 5*      $ 
Horizontal=�6   $��Center=�62   .+�5+      �� $��Guest name:��6   
������$
��Bold"�6I   $��5q�6[   $��15(�6f   �� 5,      -   5        $��cb_vendegek��5,      	 �� DisplayMemberPath$
	 Name��6/   
 �� SelectedValuePath$
 
CustomerID��6H   $	��150��6g   $��5q�6s   $��15(�6~   6�   5-      5.      �� 5/   
   $��2��6   .+�50      �� $��	Check In:��6   $��5q�6(   
������$��15(�6N   $
��Bold"�6\   (  "System.Windows.Controls.DatePicker  51      -   5        $��
dp_checkin��51   Y   $��5q�6   
���   �
�������   SelectedDate 6k   �� *ArrivalDate+6�   �� 52      $��
Check Out:��6   $��5q�6)   
������$��15(�6O   $
��Bold"�6]     53      -	   5        $��dp_checkout��53   Z   $��5q�6   
���   �
������� 6m   �� *LeavingDate+6�   54      �� 55   
   $��2��6   $��1��6"   $��3��62   .+�56      �� $��
Room type:��6   $��5q�6)   
������$��15(�6O   $
��Bold"�6]   �� 57      -
   5        $��cb_rooms��57      $��5q�6'   62   �� 58      $��Service type:��6   $��5q�6,   
������$��15(�6R   $
��Bold"�6`   �� 59      -   5        $��cb_services��59      $��5q�6~   $	 ServiceType��6�   $
 	ServiceID��6�    �� SelectedValue 6Z   �� *	ServiceID+6�   5:      �� 5;   
   $��3��6   $��2��6"   .+�5<      �� $ 
Horizontal=�6   $��Center=�62   .+�5=      �� $��Number of children:��6   $��5q�67   
������$��15(�6^   $
��Bold"�6l   �� 5>      -   5        $��
tb_childer��5>      $��50��6\   $��5q�6�   ��6h   �� *
Children+6�   5?      �� 5@      $ 
Horizontal=�6   $��Center=�62   .+�5A      �� $��Number of adults:��6   $��5q�64   
������$��15(�6Z   $
��Bold"�6h   �� 5B      -   5        $��	tb_adults��5B      $��50��6Z   $��5q�6e   ��6p   �� *Adults+5C      �� 5D      $ 
Horizontal=�6   $��Center=�66   .+�5E      �� $��Price:��6   $��5q�6-   
������$��15(�6S   $
��Bold"�6a   �� 5F      -   5        $��	lbl_price��5F       $	��100��61    �� TextAlignment$ Center=�6=   $��14(�6T   $��5q�6b   $��WrapWithOverflow=�6m   $
��Bold"�6�   
������6�   5G      5H      �� 5I   
   $��4��6   $��2��6"   .+�5J      �� $��Message:��6   
������$��15(�6B   $
��Bold"�6P   $��5,0,5,0q�6b   �� 5K      -   5        $��
tb_message��5K      $��60��6(    �� TextWrapping$
 Wrap=�64   $��14(�6H    �� AcceptsReturn$
 True��5L      $��5q�6,   " �� VerticalScrollBarVisibility$ Visible=�67   ��5K   V   �� *	Message+5L   7   5M      �� 5N   
   -   5        $��btn_save��5N   H   $��5q�6   $��5��6   $��40��6*   $
��Bold"�66   
���   �$��30,10,30,10q�6k    � 	Resources 5O       �� 
TargetType �� Property �� Value��%^   '��       �� 5P      " ��6   .�5Q      ��  �@��CornerRadius$ 5��65   5R      5S      .��5T      �� $ 
Horizontal=�6   .+�5U      �� $
��Save��6   
������$��0,0,5,0q�6B   .  (MahApps.Metro.IconPacks.PackIconMaterial  5V      $��15��6-   $��14��68      Kind$ ContentSave=�6D   
������$��Center=�6r   $��Center=�6�   5W      5X      �� 5Y   
   -   5        $��
btn_cancel��5Y   X   $��5q�6   $��5��6   $��40��6*   $��1��66   $
��Bold"�6F   
���   �$��30,10,30,10q�6}    5Z      ��%^   '��       �� 5[      " ��6   .�5\      ��  �@��CornerRadius$ 5��65   5]      5^      .��5_      �� $ 
Horizontal=�6   .+�5`      �� $��Cancel��6   
������$��0,0,5,0q�6D     5a      $��15��6-   $��14��68   $ Cancel=�6D   
������$��Center=�6m   $��Center=�6�   5b      5c      5d      5e      5f      
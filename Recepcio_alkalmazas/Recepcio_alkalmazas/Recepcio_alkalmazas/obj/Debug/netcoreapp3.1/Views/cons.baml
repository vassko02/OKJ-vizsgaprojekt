   M S B A M L   `   `   `  ����N  JRecepcio_alkalmazas, Version=1.0.0.0, Culture=neutral, PublicKeyToken=nullE'clr-namespace:Recepcio_alkalmazas.pagesRecepcio_alkalmazas.pages  5      $    Recepcio_alkalmazas.pages.cons   5      W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35e aSystem.Windows.Controls.Ribbon, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35F 9http://schemas.microsoft.com/winfx/2006/xaml/presentation     5      R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5      Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5      @d2http://schemas.microsoft.com/expression/blend/2008     5      9local'clr-namespace:Recepcio_alkalmazas.pages     5      c _MahApps.Metro.IconPacks.Core, Version=4.0.0.0, Culture=neutral, PublicKeyToken=0c0d510f9915137ag cMahApps.Metro.IconPacks.Material, Version=4.0.0.0, Culture=neutral, PublicKeyToken=0c0d510f9915137a?	iconPacks-http://metro.mahapps.com/winfx/xaml/iconpacks   6=     N� Title$
  cons��5	      .��5
      �  � ColumnDefinitions 5   
   �� 5      $	��270 �6   �� 5      $��* �6   .+�5   
   ��  �� Orientation$ Vertical=�6   $��0��6,   $	��260��6<   $
��Left=�6H   .+�5      �� $��Guest name:��6   $��Center=�6*   $��16(�6G   $
��Bold"�6U   $��5q�6g   
������$	��200��6�   �� 5      -   5        $��tb_guestinput��5   O   $	��200��6   $
��Bold"�6"   
������$��Center=�6d   $��5q�6�   5      &   System.Windows.Controls.DataGrid  5      -   5        $��dg_nevek��5   �   $��5q�6   
�������$
��Bold"�65   $	��200��6G      AutoGenerateColumns$ False��6k   $	��150��6�      CanUserAddRows$ False��6�      GridLinesVisibility$
 None=�5      ���#36393f$��0q�6K      RowBackground �#36393f$��Center=�6�      SelectionUnit$ FullRow=�6�      
IsReadOnly$
 True��6�   	   HeadersVisibility$	 Column=�6�   ��5   S   �� 
 � 	Resources
 5      =  7System.Windows.Controls.Primitives.DataGridColumnHeader �� BasedOn �� 
TargetType �� Property �� Value��%a   '        7 �� 5      8   "  6U   .�5      ��  � �� �#35363867   5      5         Columns 5      0  *System.Windows.Controls.DataGridTextColumn  5      ,  &System.Windows.Controls.DataGridColumn   Header$ 
Guest name��6)      Width5  /System.Windows.Controls.DataGridLengthConverter$ * 6V   1  +System.Windows.Controls.DataGridBoundColumn   Binding 6=   �� *Name+6V     5      $ Room number��6)   $	 100 6Y    6>   �� *RoomID+6Y   5      �� 5      $��Consumptions:��6   $��Center=�6,   $��16(�6I   $
��Bold"�6W   $��5q�6i   
������$	��200��6�     5       -   5        $��dg_fogyasztas��5    �   $	��200��6   $	��150��6#   $ FullRow=�60   $	 Column=�6`   $ �� IsSynchronizedWithCurrentItem$
 TrueY�6{   $ False��5!      $ False��63      CanUserDeleteRows$ False��6J   $��0q�6d   $��Center=�6x   $
 True��6�   
�������$
 None=�6�   $
��Bold"�5"      ���#36393f �#36393f��5    H   �� 
 5#      ��%a   '        7 �� 5$      8   "  6U   .�5%      ��  � �� �#35363867   5&      5'       5(        5)      $
 Name��6)   $ * 67      
FontWeight$
 Bold"�6A    6S   �� *
ItemName+  5*      $ Price��6)   $ 50 68    6C   �� *Price+ �� StringFormat$ $ {0}��5,      �� 5-      -   5        $��btn_eltavolit��5-   3   $��5q�6   $
��Bold"�6!   
���   �
������$��30,10,30,10q�6v   
 5.      ��%^   '��       �� 5/      " ��6   .�50      ��  �@��CornerRadius$ 5��69   51      52      .��53      �� $ 
Horizontal=�6   .+�54      �� $��Remove selected item��6   
������$��0,0,5,0q�6V   .  (MahApps.Metro.IconPacks.PackIconMaterial  55      $��20��61   $��20��6<      Kind$ Delete=�6H   
������$��Center=�6q   $��Center=�6�   56      57      �� 58      -   5        $��
lbl_osszeg��58   &   $��Price: ��6   
������$
��Bold"�6S   $��	25,5,20,5q�6e   $	��200��6x   59      �� 5:   
   $��1��6   $ Vertical=�6%   .+�5;      �� $��Select an item��6   $��Center=�6-   $��20(�6J   
������$
��Bold"�6s   $��5q�6�   �� 5<      -   5        $��	lb_itemek��5<      ���#353638$��0q�6<   $��Disabled=�5=      $	��436��6d   $	��380��6p   ��6L   �� ��5>      �� 5?      .R�5@      �  K� IsItemsHost$
 True��6$   $��Center=�67   5A      ��5C      �� 5D      .R�5E      �� -   5        
�������$	��125��5E   r   $��70��6~   
 � Tag 6%   ��  �� Path$ ItemName�.+�5F      �� $��35��6(   
�������$��5q�6G   $
��Bold"�6R   $��WrapWithOverflow=�6d   ��6�   �� $ ItemName��� 5G      
�������$��5q�6;   $
��Bold"�6F   $��WrapWithOverflow=�6X   ��6x   �� $ Price�$
 ${0}��5H      5I      5K      �� 5L      $ 
Horizontal=�6   $��Center=�62   .+�5M      �� -   5        $��btn_uj��5M   7   $��5q�6   $
��Bold"�6%   $	��150��6E   
���   �
������$��	5,15,15,5q�6   
 5N      ��%^   '��       �� 5O      " ��6    .�5P      ��  �@��CornerRadius$ 5��6=   5Q      5R      .��5S      �� $ 
Horizontal=�6!   .+�5T      �� $��Insert new item��6    
������$��0,0,5,0q�6U     5U      $��20��65   $��20��6@   $ PlusBox=�6L   
������$��Center=�6v   $��Center=�6�   5V      5W      �� 5X      -	   5        $��btn_edit��5X   7   $��5q�6   $
��Bold"�6%   $	��110��6G   
���   �
������$��	5,15,15,5q�6�   
 5Y      ��%^   '��       �� 5Z      " ��6    .�5[      ��  �@��CornerRadius$ 5��6=   5\      5]      .��5^      �� $ 
Horizontal=�6!   .+�5_      �� $��
Edit items��6    
������$��0,0,5,0q�6P     5`      $��20��65   $��20��6@   $ ClipboardEdit=�6L   
������$��Center=�6|   $��Center=�6�   5a      5b      �� 5c      $��Type:��6   
������$��5,15,0,5q�6C   $��Center=�6U   $
��Bold"�6p   �� 5d      -
   5        $��cb_typefilter��5d      $��0,15,5,5q�60   $��75��6B   $��25��6M   6Y   5e      5f      5g      5h      
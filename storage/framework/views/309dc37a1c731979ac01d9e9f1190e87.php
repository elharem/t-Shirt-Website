
<?php $__env->startSection('title', 'Retours — TEE/SHOP'); ?>
<?php $__env->startSection('eyebrow', 'Nos services'); ?>
<?php $__env->startSection('heading', 'Retours & remboursements'); ?>
<?php $__env->startSection('subtitle', '30 jours pour changer d\'avis, sans poser de questions.'); ?>

<?php $__env->startSection('page'); ?>
<h2 class="text-3xl font-display mb-3 mt-8">Délai de rétractation</h2>
<p>Conformément à la législation européenne, tu disposes de <strong>30 jours</strong> à compter de la réception de ta commande pour exercer ton droit de rétractation, sans avoir à justifier ta décision.</p>

<h2 class="text-3xl font-display mb-3 mt-10">Comment retourner un article ?</h2>
<ol>
    <li>Connecte-toi à ton compte et va dans <a href="<?php echo e(route('orders.index')); ?>" class="underline">Mes commandes</a></li>
    <li>Sélectionne la commande concernée et demande un retour</li>
    <li>Imprime l'étiquette de retour pré-payée que nous t'envoyons par email</li>
    <li>Emballe les articles dans leur état d'origine (étiquettes attachées, non portés, non lavés)</li>
    <li>Dépose le colis dans n'importe quel point bpost</li>
</ol>

<h2 class="text-3xl font-display mb-3 mt-10">Remboursement</h2>
<p>Dès réception du colis dans nos entrepôts, ton remboursement est traité sous <strong>5 jours ouvrés</strong> sur ton moyen de paiement initial. Tu recevras un email de confirmation.</p>

<h2 class="text-3xl font-display mb-3 mt-10">Articles non éligibles</h2>
<p>Pour des raisons d'hygiène, les sous-vêtements et articles personnalisés ne sont pas retournables, sauf en cas de défaut.</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/pages/retours.blade.php ENDPATH**/ ?>
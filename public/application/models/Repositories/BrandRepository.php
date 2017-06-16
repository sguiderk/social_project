namespace Repositories;
use Doctrine\ORM\EntityRepository;
use Entities;
 
class BrandRepository extends EntityRepository
{
    public function getAllActiveBrandWithModels() {
 
        $qb = $this->createQueryBuilder('b');
        $qb->select(array('b', 'm'))
            ->leftJoin('b._models', 'm')
            ->where('b._status = '.\Entities\Brand::_ACTIF)
            ->orderBy('b._title');
 
        return $qb->getQuery()->getResult();
  }
 }